<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish Kore Wa Mendo Desu</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container align-items-start ">
    <form action="{{ route('user.chapter_post') }}" method="post">
    @csrf
        <div class="col-3 mt-5">
            <h4>Chapter Title</h4>
            <input class="form-control" type="text" placeholder="Title" name="chapter_title" />
        </div>
        <div class="col-12 mt-5">
            <h4>Contents</h4>
            <input class="form-control" type="text" placeholder="Start typing" name="contents" />
        </div>
        <div class="col-3 mt-5">
            <input class="form-control" type="text" value="{{ $manga['id'] }}" name="manga_id" hidden/>
        </div>
        <div class="col-3 mt-5">
            <button type="submit" class="btn btn-primary col-12">Update Chapter</button>
        </div>
    </form>
</div>

</body>
</html>