<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 15px rgba(64, 64, 64, 0.1);
        }
        .table thead {
            background-color: #f4f4f4;
        }
        .table th, .table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1 class="text-center mt-4">Post list</h1>
    <div class="container mt-5">
        <table class="table table-striped table-hover">
            <thead>
                <div class="mb-3">
                    <a href="{{ route('post.create') }}" class="btn btn-primary px-4">Create New Post</a>
                </div>
                <tr>
                    <th scope="col">Checkbox</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            <input type="checkbox" name="select_post[]" value="{{ $post->id }}">
                        </td>
                        <td>
                            <img style="width: 100px;" src="{{ asset('uploads/images/' . $post->image) }}" alt="{{ $post->title }}" />
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route("post.edit", $post->id)}}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route("post.destroy",$post->id) }}" method="post">
                                @csrf
                                @method("Delete")
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>
