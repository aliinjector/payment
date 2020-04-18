<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Comment;
use App\Shop;
use App\ErrorLog;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Controllers\Controller;

class CommentsController extends \App\Http\Controllers\Controller
{
    public function index()
    {
      if(request()->has('notification')){
        $user = \auth()->user();
        $user->notifications()->where('type', 'App\Notifications\NewComment')->update(['read_at' => now()]);
      }
        $shop = \Auth::user()->shop()->first();
        if(\Auth::user()->is_superAdmin == 1)
        $comments = $shop->comments()->withTrashed()->get();
        else
        $comments = $shop->comments;
        SEOTools::setTitle($shop->name . ' | نظرات');
        SEOTools::setDescription($shop->name);
        SEOTools::opengraph()->addProperty('type', 'website');
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
        $shop = \Auth::user()->shop()->first();
        $shop->comments->where('id', $request->id)->first()->delete();
        $shop->comments->where('parent_id', $request->id)->first()->delete();
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();
    }


    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|min:3|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u'
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
            'comment' => 'required|min:3|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u'
        ]);
        Comment::create(array_merge([
            'user_id' => auth()->user()->id,
        ], $request->all() ));
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();
    }


    public function restore(Request $request){

      $request->validate([
    'id' => 'required|numeric|min:1|max:10000000000|regex:/^[0-9]+$/u',
      ]);
      $comment = Comment::withTrashed()->find($request->id);
      if (\Auth::user()->is_superAdmin != 1) {
          alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
          return redirect()->back();
          }
           $comment->restore();
           alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
           return redirect()->back();
         }


}
