<link rel="stylesheet" href="/app/shop/1/assets/css/comment.css">

<div style="font-family: iranyekan" class="col-12 comments-container">
    <h2 class="line-throw"><span>نظرات محصول </span></h2>

    <div class="mt-4">
        @auth
            <form method="post" action="/comment">
            @csrf
            <div class="form-group">
                <label class="" for="">ثبت نظر شما:</label>
                <textarea placeholder="متن نظر را وارد نمایید" class="form-control" name="comment" id="" cols="30" rows="5"></textarea>
                <input type="hidden" name="parent_id" value="0">
                <input type="hidden" name="commentable_id" value="{{ $product->id }}">
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <input type="hidden" name="commentable_type" value="{{ get_class($product) }}">
            </div>
            <div class="form-group">
                <center><button style="color: white" class="btn bg-blue-omid mt-4">ارسال نظر</button></center>
            </div>
        </form>
            @endauth

                @guest()
                    <a href="{{ route('login')  }}">
                        <div class="alert alert-danger">جهت ثبت نظر درسایت باید وارد شوید‌. برای ورود یا عضویت اینجا
                            کلیک کنید.
                        </div>
                    </a>
                @endguest

    </div>

    <ul id="comments-list" class="comments-list">




        @foreach ($comments->where('approved', '1')->where('parent_id', '0') as $comment)

            <li>
                <div class="comment-main-level">
                    <!-- Avatar -->
                    <div class="comment-avatar"><img src="https://icon-library.net/images/avatar-icon-png/avatar-icon-png-8.jpg" alt=""></div>
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name">{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</h6>
                            <span>{{ jdate($comment->created_at)->ago() }}</span>
                        </div>
                        <div class="comment-content">
                            {{ $comment->comment }}
                        </div>
                    </div>
                </div>



                @foreach ($comments->where('approved', '1')->where('parent_id', $comment->id) as $answer)

                    <ul class="comments-list reply-list">
                        <li>
                            <!-- Avatar -->
                            <div class="comment-avatar"><img src="https://icon-library.net/images/avatar-icon-png/avatar-icon-png-8.jpg" alt=""></div>
                            <!-- Contenedor del Comentario -->
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name">{{ $answer->user->firstName . ' ' . $answer->user->lastName }}</h6>
                                    <span>{{ jdate($answer->created_at)->ago() }}</span>
                                </div>
                                <div class="comment-content">
                                    {{ $answer->comment }}
                                </div>
                            </div>
                        </li>
                    </ul>
                @endforeach




            </li>


        @endforeach














    </ul>
</div>
