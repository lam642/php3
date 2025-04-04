<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Admin\Category;
class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Product::query()->orderBy("id", "desc");
        if($request->has("search")) {
            $query->where("name", "like", "%" . "$request->search" . "%");
        }
        $listProducts = $query->paginate(5);
        return view("Admin.products.index",compact("listProducts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        // dd($categories);
        return view("Admin.products.create", compact("categories"));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // dd($request->request->all());
    
        //ProductRequest là hàm trong Request chứa các validate(rules) và các meesages các thông báo
        //authorize quyền được truy cập
        //$request là đỗi tượng chữa các dữ liệu khi đường dùng gửi form lên
        $data = $request->validated();
        // data là biên tạo ra dùng để chứa các dữ liệu khi trải qua kiểm tra lỗi
        // $request ở đây là ProductRequest chứa đối  tượng validated 
        //validated là đối tượng chứa các dữ liệu từ form gửi lên mà đã trải qua kiểm tra lỗi trong ProductRequest (rules)
        // dd($data);
        if($request->hasFile("image")) {
            // $request->hasFile kiểm tra xem người dùng có gửi file qua form không
            // image là name vị trí của thẻ imput type = flie
            $data["image"] = $request->file("image")->store("products", "public");
            // $data["imge"] là nơi lưu trữ đường dẫn ảnh
            // $request->file("image") là sẽ trả UploadedFile đường dãn ảnh đến tệp lưu trữ
            // store("products", "public") được gọi trên đối tượng $request->file("image") tham số đầu tiên là thư mục lưu trữ anh
            // tham số thứ hai là đĩa/ thư mục lưu trữ thư mục products
        };
        Product::create($data);
        return redirect()->route("admin.products.index")->with("success", "Thêm thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product ) 
    {
        //Product là class tron models 
        //$product là đối tượng dùng để chứa các dữ liệu tìm thấy
       
        return view("Admin.products.show", compact("product"));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Lấy danh sách danh mục có trạng thái là 1
        $categories = Category::query()->where("status", 1)->get();
    
        // Trả về view và truyền dữ liệu vào
        return view("Admin.products.edit")
            ->with("categories", $categories)  // Truyền danh mục vào view
            ->with("product", $product);  // Truyền sản phẩm vào view
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
        $data = $request->validated();
        if($request->hasFile("image")) {
            $data["image"] = $request->file("image")->store("products", "public");
            $product->update($data); // update chỉ thể gọi qua từ một đối tượng như $product không thể gọi trực tiếp từ Models
            return redirect()->route("admin.products.index")->with("success", "Sửa thành công");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
       $product->delete();
       return redirect()->route("admin.products.index")->with("success", "Xóa thành công");

    }
}
