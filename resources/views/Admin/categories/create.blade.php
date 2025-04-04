@extends("admin.layouts.app")

@if(session("success"))
    <div class="alert alert-success">
        {{ session("success") }}
    </div>
@endif

@if(session("error"))
    <div class="alert alert-danger">
        {{ session("error") }}
    </div>
@endif

@section("title", "Thêm danh mục")
@section("content")
    <div class="card">
        <div class="card-header">
        <h4>Thêm danh mục</h4>
        </div>
        <div class="card-body">
        <form action="{{ route("admin.categories.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="" class="form-control">
                @error("name")
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Trạng thái</label>
                <select name="status" id="" class="form-control">
                    <option value="1">Hoạt đông</option>
                    <option value="0">Tạm dừng</option>
                </select>
                @error("status")
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-info"><a href="{{ route("admin.products.index") }}"></a>Quay lại</button>
            <button type="submit" class="btn btn-success">Thêm danh mục</button>
        </form>
        </div>
    </div>
@endsection