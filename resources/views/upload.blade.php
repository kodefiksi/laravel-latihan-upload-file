<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan Upload Gambar</title>
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container col-lg-6">
        {{-- Form --}}
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="py-5">
            @csrf
            <div class="input-group mb-3">
                <input type="file" class="form-control" aria-describedby="button-addon2" accept=".png,.jpg,.webp" name="image" required>
                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Upload</button>
            </div>

            {{-- Menampilkan pesan sukses upload --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Menampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="my-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

        {{-- List gambar yang berhasil diupload --}}
        <h2 class="fs-5 fw-bold">List Gambar:</h2>
        <ol class="list-group list-group-numbered">
            @foreach ($data as $path)
                <li class="list-group-item">
                    <a href="{{ $path }}" target="_blank">
                        {{ basename($path) }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>

    {{-- Bootstrap JS--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
