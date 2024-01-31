<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish Kore Wa Mendo Desu</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container align-items-start ">
    <form action="{{ route('admin.chapter_post') }}" method="post">
    @csrf
        <div class="col-3 mt-5">
            <h4>Chapter Title</h4>
            <input class="form-control" type="text" placeholder="Title" name="chapter_title" />
        </div>
        <div class="col-3 mt-5">
            <h4>Date Published</h4>
            <input class="form-control" type="text" placeholder="Release" name="date" />
        </div>
        <div class="col-3 mt-5">
            <h4>Manga_ID</h4>
            <input class="form-control" type="text" value="{{ $data }}" name="manga_id" readonly/>
        </div>
        <div class="col-3 mt-5">
            <h4>Status</h4>
            <input class="form-control" type="text" value="1" name="status" readonly/>
        </div>
        <div class="col-12 mt-5">
            <h4>Contents</h4>
            <input class="form-control" type="text" placeholder="Start typing" name="contents" />
        </div>
        <div class="col-3 mt-5">
            <button type="submit" class="btn btn-primary col-12">Update Chapter</button>
        </div>
    </form>
</div>

</body>
</html>