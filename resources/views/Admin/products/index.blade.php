@extends('admin.layouts.app')
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

@section("title", "Danh sách sản phẩm")
@section("content")
    <div class="container">
        <h2>Danh sách sản phẩm</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
        <form method="get" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm"
                    value="{{ request('search') }}">
                <button class="btn btn-outline-secondary">Tìm kiếm</button>
            </div>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Ảnh</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listProducts as $key => $pro)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pro->name }}</td>
                        <td>{{ $pro->price }}</td>
                        <td>{{ $pro->quantity }}</td>
                        <!-- <td><img src="{{ asset($pro->image) }}" alt="Ảnh sản phẩm" width="100"></td> -->
                        <td><img src="{{ asset('storage/' . $pro->image) }}" alt="Ảnh sản phẩm" width="100"></td>
                        <td>{{ $pro->category->name }}</td>
                        <td>{{ $pro->status == 1 ? "Còn hàng" : "hết hàng" }}</td>
                        <td>
                            <a href="{{ route("admin.products.edit", $pro->id) }}" class="btn btn-warning">Sửa</a>
                           <Form action="{{ route("admin.products.destroy", $pro->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" onclick="return confirm('Bạn có muốn xóa')" class="btn btn-danger">Xóa</button>
                           </Form>
                           <a href="{{ route("admin.products.show", $pro->id) }}" class='btn btn-info'> Xem chi tiết </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $listProducts->links('pagination::bootstrap-5') }}
    </div>
@endsection