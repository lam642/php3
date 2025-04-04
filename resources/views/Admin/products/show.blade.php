@extends("admin.layouts.app")
@section("title", "Xem chi tiết")
@section("content")
<div class="container">
    <div class="name col-mb3">
        <label for="" class="form-control">Tên sản phẩm</label>
        <p>{{ $product->name }}</p>
    </div>

    <div class="price col-mb3">
        <label for="" class="form-control">Giá</label>
        <p>{{ $product->price }}</p>
    </div>

    <div class="quantity col-mb3">
        <label for="" class="form-control">Số lượng</label>
        <p>{{ $product->quantity }}</p>
    </div>

    <div class="image col-mb3">
        <label for="" class="form-control">Ảnh sản phẩm</label>
        <img src="{{ asset('storage/' . $product->image) }}" alt="ảnh sản phẩm" style="width:100px">
    </div>

    <div class="description col-mb3">
        <label for="" class="form-control">mô tả sản phẩm</label>
        <p>{{ $product->description }}</p>
    </div>

    <div class="cartegory_id col-mb3">
        <label for="" class="form-control">Tên danh mục</label>
        <p >{{ $product->category_name}}</p>
    </div>

    <div class="status col-mb3">
        <label for="" class="form-control">Trạng thái</label>
        <p>{{ $product->status == 1 ? "Còn hàng" : "Hết hàng"}}</p>
    </div>
    <div class="btn">
        <button class="btn btn-info"><a href="{{ route("admin.products.index") }}"></a>Quay lại</button>
    </div>
</div>
@endsection