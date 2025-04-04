<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\CategoryRequest;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $query = Category::query();
        if($request->has(key: 'search')) {
            $query->where("name", "like", "%" . $request->search . "%");
        }
        $categories = $query->orderBy("id", "desc")->paginate(20);
        return view("Admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request,  Category $category)
    {
        Category::created($request->validated());
        return redirect()->route("admin.categories.index")->with("success", "Thêm thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        $productCateById = Product::query()->where("category_id", $category)->get();
        return view("Admin.categories.show", compact("productCateById", "category"));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Category $category)
    {
        //
        return view("Admin.categories.edit", compact( "category"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $cate)
    {
        //
        $cate->update($request->validated());
        return redirect()->route("admin.categories.index")->with("success", "Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $category)
    {
        //
        $category->delete();
        return redirect()->route("admin.categories.index")->with("success","Xóa thành công");
        
    }
}
