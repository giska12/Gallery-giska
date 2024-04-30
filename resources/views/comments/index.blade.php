<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments || {{ $image->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="/" class="btn btn-primary">Back</a>
                <br>
                <br>
                <img src="{{ asset('storage/images/' . $image->image) }}" style="width: 100% !important;"
                    class="card-img-top w-100" alt="{{ $image->title }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $image->title }}</h1>
                <h3>{{ $image->description }}</h3>
                <p>Created By: {{ $image->user->name }}</p>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-md-12">
            <h3>Tambah Komentar:</h3>
            <form action="{{ route('comments.post', ['id' => $image->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Komentar</label>
                    <textarea name="comments" class="form-control"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>

        <div class="col-md-12">
            @foreach ($comments as $comment)
                <br>
                <div class="card">
                    <div class="card-header">
                        <p>Created By: {{ $comment->user->name }}</p>
                    </div>
                    <div class="card-body">
                        <h5>{{ $comment->comments }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
