<h2 class="line-throw mt-5"><span class="throw-background">محصولات پیشنهادی </span></h2>
<div class="row row p-5">
    @forelse ($offeredProducts as $offeredProduct)
      <div class="col-lg-4">
          <div class="card e-co-product" style="min-height: 40vh;">
              <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$offeredProduct->slug, 'id' => $offeredProduct->id]) }}"><img src="{{ asset($offeredProduct->image['250,250'] ? $offeredProduct->image['250,250'] : '/images/no-image.png') }}" alt="" class="img-fluid"></a>
              <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$offeredProduct->slug, 'id' => $offeredProduct->id]) }}" class="product-title">{{ $offeredProduct->title }}</a>
                  <div class="d-flex justify-content-between my-2 byekan">
                      @if($offeredProduct->off_price != null and $offeredProduct->off_price_started_at < now() and $offeredProduct->off_price_expired_at > now())
                              <p class="product-price byekan">{{ number_format($offeredProduct->off_price) }} تومان <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($offeredProduct->price) }} تومان</del></span>
                              </p>
                              @else
                              <p class="product-price byekan">{{ number_format($offeredProduct->price) }} تومان <span class="ml-2 byekan"></span>
                                  @endif
                  </div>
                  <p class="text-center">
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$offeredProduct->slug, 'id' => $offeredProduct->id]) }}"><button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> مشاهده
                              جزییات</button></a>
                  </p>
              </div>
          </div>
      </div>
    @empty
      <div class="align-items-center justify-content-center row w-100 text-danger">
          <h4>
              {{ __('app-shop-1-index.noProduct') }}
          </h4>
      </div>
    @endforelse
    </div>
