<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Gambar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
  <h1 class="my-4">Edit Gambar</h1>
  <form action="{{ route("image.update", $image->id) }}" method="POST" enctype="multipart/form-data" id="imageForm">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" value="{{ $image->title }}" name="title">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input class="form-control" id="description" name="description" value="{{ $image->description }}" rows="3">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
    </div>
    <div class="mb-3">
      <img id="preview" src="{{ asset('storage/images/' . $image->image) }}" alt="Image Preview" class="img-fluid" style="max-width: 300px;">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/"  class="btn btn-danger">Back</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function previewImage(event) {
  var preview = document.getElementById('preview');
  var file = event.target.files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
</script>
</body>
</html>
