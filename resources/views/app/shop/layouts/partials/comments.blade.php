<link rel="stylesheet" href="/app/shop/assets/css/comment.css">

<div style="font-family: iranyekan" class="comments-container">
    <h1>نظرات محصول</h1>

    <div class="mt-4">
        @auth

            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>متاسفانه مشکلی در ارسال نظر رخ داده است:</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <form method="post" action="/comment">
            @csrf
            <div class="form-group">
                <label class="" for="">ثبت نظر شما:</label>
                <textarea placeholder="متن نظر را وارد نمایید" class="form-control" name="comment" id="" cols="30" rows="5"></textarea>
                <input type="hidden" name="parent_id" value="0">
                <input type="hidden" name="commentable_id" value="{{ $product->id }}">
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
                            <h6 class="comment-name">{{ $comment->user->fullName }}</h6>
                            <span>{{ jdate($comment->created_at)->ago() }}</span>
                            <i class="fa fa-reply"></i>
                        </div>
                        <div class="comment-content">
                            {{ $comment->comment}}
                        </div>
                    </div>
                </div>
            </li>


        @endforeach







        <li style="display: none">
            <div class="comment-main-level">
                <!-- Avatar -->
                <div class="comment-avatar"><img src="https://icon-library.net/images/avatar-icon-png/avatar-icon-png-8.jpg" alt=""></div>
                <!-- Contenedor del Comentario -->
                <div class="comment-box">
                    <div class="comment-head">
                        <h6 class="comment-name"><a href="http://creaticode.com/blog">علی رحمانی</a></h6>
                        <span>10 دقیقه پیش</span>
                        <i class="fa fa-reply"></i>
                    </div>
                    <div class="comment-content">
                        متن نظر
                    </div>
                </div>
            </div>
            <!-- Respuestas de los comentarios -->
            <ul class="comments-list reply-list">
                <li>
                    <!-- Avatar -->
                    <div class="comment-avatar"><img src="https://icon-library.net/images/avatar-icon-png/avatar-icon-png-8.jpg" alt=""></div>
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name"><a href="http://creaticode.com/blog">علی رحمانی</a></h6>
                            <span>10 دقیقه پیش</span>
                            <i class="fa fa-reply"></i>
                        </div>
                        <div class="comment-content">
                            متن نظر
                        </div>
                    </div>
                </li>

                <li>
                    <!-- Avatar -->
                    <div class="comment-avatar"><img src="https://icon-library.net/images/avatar-icon-png/avatar-icon-png-8.jpg" alt=""></div>
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">علی رحمانی</a></h6>
                            <span>10 دقیقه پیش</span>
                            <i class="fa fa-reply"></i>
                        </div>
                        <div class="comment-content">
                            متن نظر
                        </div>
                    </div>
                </li>
            </ul>
        </li>






    </ul>
</div>
