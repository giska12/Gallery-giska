<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Membuat Album</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <h1 class="my-4">Create Album</h1>
  <form action="{{ route("album.store") }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Album Title</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Select Images</label>
      <select class="form-select" id="image" name="images[]" multiple required>
        @foreach($data as $image)
        {{ $image }}
          <option value="{{ $image->id }}">{{ $image->title }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Create Album</button>
    <a href="/"  class="btn btn-danger">back</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
