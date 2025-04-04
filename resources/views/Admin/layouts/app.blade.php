<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>PHP3</title>
</head>
<body>
    <div class="container mb-4">
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route("admin.categories.index") }}" class="btn btn-info">Quản lý danh mục</a>
            <a href="{{ route("admin.products.index") }}" class="btn btn-info">Quản lý sản phẩm</a>
        </div>
    </div>
    @yield("content")
</body>
</html>