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

@section("title", "Thêm sản phẩm")
@section("content")
    <div class="card">
        <div class="card-header">
        <h4>Thêm sản phẩm</h4>
        </div>
        <div class="card-body">
        <form action="{{ route("admin.products.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name">
                @error("name")
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Giá</label>
                <input type="text" class="form-control" name="price">
                @error("price")
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Số lượng</label>
                <input type="text" class="form-control" name="quantity">
                @error("quantity")
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">mô tả sản phẩm</label>
                <textarea name="description" id="" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Tên danh mục</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $value )
                    @if($value->id != 16)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endif
                    @endforeach
                </select>
                @error("category_id")
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Trạng thái</label>
                <select name="status" id="" class="form-control">
                    <option value="1">Còn hàng</option>
                    <option value="0">Hết hàng</option>
                </select>
            </div>
            <button class="btn btn-info"><a href="{{ route("admin.products.index") }}"></a>Quay lại</button>
            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        </form>
        </div>
    </div>
@endsection