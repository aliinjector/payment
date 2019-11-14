<?php

namespace App\Http\Controllers\Shop;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class CommentController extends  \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }







    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|min:3|max:1000'
        ]);
        Comment::create(array_merge([
            'user_id' => auth()->user()->id,
        ], $request->all() ));
        alert()->success('نظر شما پس از تایید قرارداده خواهد شد.', 'ثبت شد');

        return redirect()->back();
    }


    public function answer(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|min:3|max:1000'
        ]);
        Comment::create(array_merge([
            'user_id' => auth()->user()->id,
        ], $request->all()));
        alert()->success('پاسخ شما با موفقیت ثبت شد.', 'انجام شد');
        return redirect()->back();
    }


}
