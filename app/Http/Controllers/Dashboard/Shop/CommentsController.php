<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Comment;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $shop = \Auth::user()->shop()->first();
        $comments = $shop->comments;
        return view('dashboard.shop.product-comments', compact('comments' , 'shop'));
    }

    public function notApproved()
    {
        $comments = Comment::orderBy('created_at', 'desc')->where('approved', '0')->with('user', 'commentable')->get();
        return view('dashboard.comments.index', compact('comments'));
    }
    public function approve($id, $commentable_id)
    {
        Comment::where('id', $id)->update(['approved' => 1]);
        alert()->success('نظر باموفقیت تایید شد.', 'انجام شد');
        return redirect()->back();
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
    public function destroy(Comment $comment, Request $request)
    {
        Comment::find($request->id)->delete();
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();
    }
    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|min:3|max:1000'
        ]);
        Comment::create(array_merge([
            'user_id' => auth()->user()->id,
        ], $request->all() ));
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();
    }
    public function answer(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|min:3|max:1000'
        ]);
        Comment::create(array_merge([
            'user_id' => auth()->user()->id,
        ], $request->all() ));
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();
    }


}
