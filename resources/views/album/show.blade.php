<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boostraps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Album Giska</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($data as $image)
                <div class="col">
                    <div class="card">
                        @foreach ($image->images as $album)
                            <img src="{{ asset('storage/images/' . $album->image) }}" class="card-img-top"
                                alt="{{ $album->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $album->title }}</h5>
                                <p class="card-text">{{ $album->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                        @endforeach

                    </div>
                </div>
        </div>
    </div>
    @endforeach
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
