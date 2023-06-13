<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->get();
        $category = Category::all();

        return view('pages.admin.product.index', compact('product', 'category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('pages.admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name,',
            'category_id' => 'required',
            'price' => 'required|integer',
            'description' => 'required|string'
            
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);

        if($product){
            return redirect()->route('dashboard.product.index')->with([
                'success' => 'data berhasil disimpan'
            ]);
        }else{
            return redirect()->route('dashboard.product.index')->with([
                'error' => 'data gagal disimpan'
            ]);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);

        return view('pages.admin.product.show', compact('category', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('name', 'ASC')->get();
        $product = Product::findOrFail($id);

        return view('pages.admin.product.edit', compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255|unique:categories,name,'. $id,
            'category_id' => 'required',
            'price' => 'required|integer|min:1000',
            'description' => 'required|string'
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);

        if($product){
            return redirect()->route('dashboard.product.index')->with([
                'success' => 'data berhasil diedit'
            ]);
        }else{
            return redirect()->route('dashboard.product.index')->with([
                'error' => 'data gagal diedit'
            ]);
        } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        if($product)
        {
            return redirect()->route('dashboard.product.index')->with([
                'success' => 'data berhasil dihapus'
            ]);
        }else{
            return redirect()->route('dashboard.product.index')->with([
                'error' => 'data gagal dihapus'
            ]);
        }
    }
}
