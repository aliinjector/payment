<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Gallery;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $galleries = $product->galleries;
        return view('dashboard.shop.product-galleries', compact('product', 'galleries'));
    }


    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/product-galleries/' . \Auth::user()->id), $imageName);

        $imageAddress = 'images/product-galleries/' . \Auth::user()->id . '/' . $imageName;
        $imageUpload = new Gallery();
        $imageUpload->filename = $imageAddress;
        $imageUpload->product_id = $request->product;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        $imageAddress = implode('/', array_slice(explode('/', $filename), -4, 4, true));
        Gallery::where('filename', $imageAddress)->delete();
//        $path = public_path() . 'images/product-galleries/' . \Auth::user()->id . '/' . $filename;
//        if (file_exists($path)) {
//            unlink($path);
//        }
        return $filename;
    }




}
