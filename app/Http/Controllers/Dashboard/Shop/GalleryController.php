<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Gallery $gallery)
    {
        return view('dashboard.shop.product-galleries');
    }


    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images/product-galleries/' . \Auth::user()->id),$imageName);

        $imageUpload = new Gallery();
        $imageUpload->filename = $imageName;
        $imageUpload->product_id = $request->product;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        Gallery::where('filename',$filename)->delete();
        $path=public_path().'images/product-galleries/' . \Auth::user()->id . '/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }




}
