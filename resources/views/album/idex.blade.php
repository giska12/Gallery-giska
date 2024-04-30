<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Album Giska</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Image Gallery</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    @foreach($data as $album)
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $album->title }}</h5>
          <a href="{{ route("album.detail", $album->title) }}" class="btn btn-primary">View Album</a>
          <form action="{{ route("album.delete", $album->title) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
        </form>
        </div>
      </div>
    </div>
    @if($loop->iteration % 3 == 0)
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @endif
    @endforeach
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
