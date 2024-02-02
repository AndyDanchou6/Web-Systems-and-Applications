<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MangaModel;
use App\Models\ChaptersModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RequestsModel;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin_dashboard() {
        $all = MangaModel::all();

        return view('admin.admin_dashboard', ['all' => $all]);
    }

    public function publish() {
        return view('admin.publish');
    }

    public function publish_post(Request $request) {

        $id = Auth::id();
        
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'date_published' => 'required',
        ]);

        $exists = MangaModel::where('title', $request->title)->first();

        if ($exists == null) {
            $manga = DB::table('manga')->insert([
                'title' => $request->title,
                'author' => $request->author,
                'genre' => $request->genre,
                'date_published' => $request->date_published,
                'description' => $request->description,
                'user_id' => $id
            ]);

            return redirect(route('admin.dashboard'));
        }

        else {
            return redirect()->back();
        }

        //dd($i);
    }

    public function admin_action() {
        $action = MangaModel::where('genre', 'Action')->get();

        return view('admin.admin_action', ['action' => $action]);
    }

    public function admin_romcom() {
        $romcom = MangaModel::where('genre', 'RomCom')->get();

        return view('admin.admin_romcom', ['romcom' => $romcom]);
    }
    public function admin_horror() {
        $horror = MangaModel::where('genre', 'Horror')->get();

        return view('admin.admin_horror', ['horror' => $horror]);
    }

    public function admin_isekai() {
        $isekai = MangaModel::where('genre', 'Isekai')->get();

        return view('admin.admin_isekai', ['isekai' => $isekai]);
    }
    public function admin_other() {
        $other = MangaModel::where('genre', 'Other')->get();

        return view('admin.admin_other', ['other' => $other]);
    }

    public function admin_edit(MangaModel $data) {
        return view('admin.admin_edit', ['data' => $data]);
    }

    public function admin_update (Request $request, MangaModel $data) {
        $update = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'date_published' => 'required'
        ]);

        $data->update($update); 

        if (!$data) {
            return redirect()->back()->with('error', 'Operation Failed Successfully');
        }

        return redirect(route('dashboard'));
    }

    public function admin_delete($id) {
        $del = MangaModel::where('id', $id)->first();

        if(!$del) {
            return redirect(route('admin_dashboard'))->with('error', 'ID do not exist');
        }

        $del->delete();
        return redirect()->back();
    }

    public function manage() {
        if (Auth::check()) {
            $users = User::all();
            return view('admin.admin_manage', ['users'=> $users]);
        } else {

            return redirect()->back()->with('error', 'Not Logged In');
        } 
    }

    public function requests() {
        $new_reqs = RequestsModel::where('status', '0')->get();

        return view('admin.admin_requests', ['requests' => $new_reqs]);
        //dd($new_reqs);
    }

    public function edit_req(RequestsModel $data) {
        return view('admin.edit_req', ['data' => $data]);
    }

    public function pub_req(Request $request, $id) {
        $update = $request->validate([
            'date_published' => 'required'
        ]);

        $data = RequestsModel::find($id);
        $exists = MangaModel::where('title', $data->title)->first();

        if ($exists) {
            return redirect()->back();
        }

        else {
            $data->date_published = $request['date_published'];
            $data->status = 1;
            $data->save();

            if (!$data) {
                return redirect()->back()->with('error', 'Operation Failed Successfully');
            }

            $updatedReq = RequestsModel::find($id);

            $newManga = DB::table('manga')->insert([
                'title' => $updatedReq['title'],
                'author' => $updatedReq['author'],
                'genre' => $updatedReq['genre'],
                'date_published' => $updatedReq['date_published'],
                'description' => $updatedReq['description'],
                'user_id' => $updatedReq['user_id']
            ]);

            return redirect()->back();
        }
        dd($exists);
    }

    public function details(MangaModel $data) {
        return view('admin.admin_showManga', ['data' => $data]);
        dd($data);
    }

    public function req_details(RequestsModel $data) {
        return view('admin.admin_showReq', ['data' => $data]);
        //dd($new_req);
    }

    public function req_deny(RequestsModel $data) {
        $id = $data['id'];

        $req_deny = RequestsModel::find($id);
        $req_deny['status'] = 2;
        $req_deny->save();

       return redirect(route('admin.dashboard'));

        //dd($req_deny['status']);
    }

    // chapters

    public function new_chaps(){
        $chaps = ChaptersModel::where('status', '0')->get();
        return view('admin.admin_newchaps', ['data' => $chaps]);
        //dd($chaps);
    }

    public function view_chaps(ChaptersModel $data) {
        return view('admin.admin_chapview', ['data' => $data]);
        //dd($data['id']);
    }

    public function chap_release(Request $request) {
        $chap_date = ChaptersModel::find($request['id']);
        $chap_date['date'] = $request['date'];
        $chap_date['status'] = 1;
        $chap_date->save();

        return redirect(route('admin.dashboard'));
        //dd($request['date']);
    }

    public function chap_deny($id) {
        $chapter = ChaptersModel::find($id);
        $chapter->status = 2;
        $chapter->save();

        return redirect(route('admin.chapter_updates'));
        //dd($chapter->status);
    }

    public function chapter_list() {
        $admin = Auth::id();
        $admin_posts= MangaModel::where('user_id', $admin)->get();

        return view('admin.admin_addchap', ['data' => $admin_posts]);

        //dd($admin_posts);
    }

    public function admin_viewchaps($data) {
        $chap = ChaptersModel::where('id', $data)->first();
        return view('admin.admin_view', ['data' => $chap]);

        //dd($data);
    }

    public function add_chap($data) {
        return view('admin.admin_chaprelease',['data' => $data]);

        //dd($data);
    }

    public function chap_post(Request $request) {

        $validate = [
            'chapter_title' => $request['chapter_title'],
            'date_published' => $request['date_published'],
            'contents' => $request['contents']
        ];

        if ($validate['chapter_title'] == null || $validate['date_published'] == null || $validate['contents'] == null) {
            return redirect()->back();
        }

        $newChapter = DB::table('chapters')->insert([
            'chapter_title' => $request['chapter_title'],
            'date' => $request['date'],
            'manga_id' => $request['manga_id'],
            'status' => $request['status'],
            'contents' => $request['contents']
        ]);

        return redirect(route('admin.dashboard'));

        //dd($validate);
    }

    public function chapters($data) {
        $chapter = ChaptersModel::where('manga_id', $data)->where('status', 1)->get();

        return view('admin.admin_chapters', ['data' => $chapter]);
        //dd($chapter);
    }
}
