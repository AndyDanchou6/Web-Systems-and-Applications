<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish Kore Wa Mendoda</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container align-items-start ">
    <form action="{{ route('admin.publish_req', ['id' => $data]) }}" method="post">
    @csrf
    @method('put')
        <div class="col-3 mt-5">
            <h4>Title</h4>
            <input class="form-control" type="text" placeholder="{{ $data->title }}" name="title" readonly/>
        </div>
        <div class="col-3 mt-5">
            <h4>Author</h4>
            <input class="form-control" type="text" placeholder="{{ $data->author }}" name="author" readonly/>
        </div>
        <div class="col-3 mt-5">
            <h4>Genre</h4>
            <input class="form-control" type="text" placeholder="{{ $data->genre }}" readonly/>
        </div>
        <div class="col-3 mt-5">
            <h4>Date of Request</h4>
            <input class="form-control" type="text" placeholder="{{ $data->date_of_request }}" name="date_published" readonly/>
        </div>
        <div class="col-3 mt-5">
            <h4>Date Published</h4>
            <input class="form-control" type="text" placeholder="{{ $data->date_published }}" name="date_published" />
        </div>
        <div class="col-3 mt-5">
            <button type="submit" class="btn btn-primary col-12">Publish</button>
        </div>
    </form>
</div>

<script>
        function selectOption(option) {
            document.getElementById('selectedOption').value = option;
        }
    </script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>