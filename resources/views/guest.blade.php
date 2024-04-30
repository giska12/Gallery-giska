<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstraps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Giska</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tambah-gambar">Tambah Gambar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/album">Membuat album</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/album/view">Album</a>
                    </li>
                </ul>
            </div>
            <div class="navbar nav">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary ">Register</a>
                @else
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($data as $image)
                <div class="col">
                    <div class="card bg-dark text-white">
                        <img src="{{ asset('storage/images/' . $image->image) }}" class="card-img-top"
                            alt="{{ $image->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $image->title }}</h5>
                            <p class="card-text">{{ $image->description }}</p>
                            <p>{{ $likeCounts[$image->id] }} Likes</p>
                            <div class="d-flex">
                                <form action="{{ route('like', ['id' => $image->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary"
                                        style="margin-right: 5px">Like</button>
                                </form>
                                <a href="{{ route('comments.index', ['id' => $image->id]) }}"
                                    class="btn btn-light">Comments</a>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
