<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $items = $product->galleries()->get();

        return view('pages.admin.product_gallery.index', compact('product', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('pages.admin.product_gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        // file upload
        $files = $request->file('files');

        // looping
        foreach ($files as $file)
        {
            $file->storeAs('public/products/', $file->hashName());

            $product->galleries()->create([
                'products_id' => $product->id,
                'url' => $file->hashName(),
            ]);
        }

        if($product){
            return redirect()->route('dashboard.product.gallery.index', $product->id)->with([
                'success' => 'data berhasil disimpan'
            ]);
        }else{
            return redirect()->route('dashboard.product.gallery.index', $product->id)->with([
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductGallery $gallery)
    {
        $product = Product::find($gallery->products_id);

        $gallery = $product->galleries->find($gallery->id);

        Storage::delete('public/products/' . basename($gallery->url));

        $gallery->delete();

        if($gallery)
        {
            return redirect()->route('dashboard.product.gallery.index', $gallery->products_id)->with([
                'success' => 'data berhasil dihapus'
            ]);
        }else{
            return redirect()->route('dashboard.product.gallery.index', $product->products_id)->with([
                'error' => 'data gagal dihapus'
            ]);
        }
    }
}
