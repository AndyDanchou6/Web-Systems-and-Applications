<?php

namespace App\Http\Controllers;
use App\Models\MangaModel;
use App\Models\RequestsModel;
use App\Models\ChaptersModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function user_dashboard() {
        $user_all = MangaModel::all();

        return view('user.user_dashboard',['user_all' => $user_all]);
    }

    public function user_action() {
        $action = MangaModel::where('genre', 'Action')->get();

        return view('user.user_action', ['action' => $action]);
    }

    public function user_romcom() {
        $romcom = MangaModel::where('genre', 'RomCom')->get();

        return view('user.user_romcom', ['romcom' => $romcom]);
    }
    public function user_horror() {
        $horror = MangaModel::where('genre', 'Horror')->get();

        return view('user.user_horror', ['horror' => $horror]);
    }

    public function user_isekai() {
        $isekai = MangaModel::where('genre', 'Isekai')->get();

        return view('user.user_isekai', ['isekai' => $isekai]);
    }
    public function user_other() {
        $other = MangaModel::where('genre', 'Other')->get();

        return view('user.user_other', ['other' => $other]);
    }

    public function manage() {
        return view('user.user_manage');
    }

    public function user_publish() {
        return view('user.publish');
    }

    public function user_publish_post(Request $request) {
        $id = Auth::id();
        if ($request->title == !null && $request->author == !null && $request->genre == !null && $request->date_of_request == !null) {

            $manga = DB::table('requests')->insert([
                'title' => $request->title,
                'author' => $request->author,
                'genre' => $request->genre,
                'date_of_request' => $request->date_of_request,
                'description' => $request->description,
                'user_id' => $id
            ]);

            if (!$manga) {
                return redirect()->back()->with('error1', 'Request Failed');
            }

            return redirect(route('user.dashboard'));
        }

        return redirect()->back()->with('error', 'Fill all the Requirements');

        // dd($request);
    }

    public function manga_details(MangaModel $data) {
        return view('user.user_manga_details', ['data' => $data]);

        //dd($data);
    }

    public function library() {
        $id = Auth::id();
        $req = RequestsModel::where('user_id', $id)->get();

        return view('user.user_library', ['data' => $req]);

        // dd($req);
    }

    public function request_details(RequestsModel $data) {
        $manga = MangaModel::where('title', $data['title'])->first();

        if ($manga == null) {
            return view('errorHandler.empty');
        }
            
        $chapters = ChaptersModel::where('manga_id', $manga['id'])->first();

        if ($chapters == !null) {
            $data['chapter_title'] = $chapters['chapter_title'];
            $data['date'] = $chapters['date'];
            $data['contents'] = $chapters['contents'];
            $data['status'] = $chapters['status'];
            $data['manga_id'] = $chapters['manga_id'];
            $data['id'] = $chapters['id'];
        }
        return view('user.user_request_detail', ['data' => $data]);
        

        //dd($manga);
    }

    public function approved_req() {
        $id = Auth::id();
        $app_reqs = RequestsModel::where(['user_id'=> $id, 'status' => 1])->get();

        return view('user.approved_reqs', ['data' => $app_reqs]);

        // dd($reqs);
    }

    public function denied_req() {
        $id = Auth::id();
        $den_reqs = RequestsModel::where(['user_id'=> $id, 'status' => 2])->get();

        return view('user.denied_reqs', ['data' => $den_reqs]);

        // dd($den_reqs);
    }

    public function pending_req() {
        $id = Auth::id();
        $den_reqs = RequestsModel::where(['user_id'=> $id, 'status' => 0])->get();

        return view('user.pending_req', ['data' => $den_reqs]);

        // dd($den_reqs);
    }

    public function manga_update($data) {
        $manga = MangaModel::where('title', $data)->first();

        return view('user.user_add_chapter', ['manga' => $manga]);
        //dd($data);
    }

    public function chapter_post(Request $request) {
        $new_chapter = DB::table('chapters')->insert([
            'chapter_title' => $request->chapter_title,
            'contents' => $request->contents,
            'manga_id' => $request->manga_id
        ]);

        return redirect(route('user.dashboard'));
        //dd($request);
    }

    public function view_chapter($data) {
        $chap = ChaptersModel::where('id', $data)->first();
        return view('user.user_chapter_view', ['data' => $chap]);
        //dd($data);
    }

    public function chap_lists($data) {
        $chap = ChaptersModel::where('manga_id', $data)->get();
        return view('user.user_chaplists', ['data' => $chap]);
        //dd($chap);
    }
}
