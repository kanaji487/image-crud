<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  </head>
  <body>
    <section>
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            @if (session()->has("success"))
              <div class="alert alert-success">
                {{ session()->get("success") }}
              </div>
            @endif
            <div class="card p-4 shadow-sm">
              <h2 class="mb-4 text-center">Add Form</h2>
              <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" />
                  @error('title')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control" name="image" id="image" />
                  <img style="width: 100px;" src="{{ asset("uploads/images/".$post->image) }}" alt="{{ $post->title }}" />
                  @error('image')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea name="description" class="form-control" id="description" cols="30" rows="5" value="{{ $post->description }}">{{ $post->description }}</textarea>
                  @error('description')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="d-flex">
                  <a href="{{ route('post.index') }}" class="btn btn-secondary w-50 me-2">Back</a>
                  <button type="submit" class="btn btn-primary w-50">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
        @if(Session::has('success'))
        Toastify({
            text: "{{ Session::get('success') }}",
            duration: 3000,
            close: true,
            gravity: "top", // ตำแหน่งบน
            position: "right", // แสดงทางขวา
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
        }).showToast();
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  </body>  
</html>