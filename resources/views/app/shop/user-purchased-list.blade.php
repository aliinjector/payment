@extends('app.shop.1.layouts.master')
@section('content')
                    <div class="card">
                        <div class="card-body">
                          @php $i=1 @endphp
                          @foreach ($purchases as $purchase)
                            <div class="accordion" id="accordionExample{{$purchase->id}}">
                                <div class="card border mb-0 shadow-none">
                                    <div class="card-header p-0  d-flex justify-content-between align-items-center px-4 byekan" id="headingOne{{$purchase->id}}">
                                        <h5 class="my-1">
                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne{{$purchase->id}}" aria-expanded="false" aria-controls="collapseOne">
                                                سفارش شماره @php echo $i @endphp
                                                </button>
                                            </h5>
                                            {{ jdate($purchase->created_at) }}

                                    </div>

                                    <div id="collapseOne{{$purchase->id}}" class="collapse" aria-labelledby="headingOne{{$purchase->id}}" data-parent="#accordionExample{{$purchase->id}}" style="">
                                        <div class="card-body">
                                          <table class="table table-hover mb-0">
                                              <thead class="thead-light">
                                                  <tr class="byekan">
                                                      <th class="border-top-0">محصول</th>
                                                      <th class="border-top-0">نام</th>
                                                      <th class="border-top-0">زمان سفارش</th>
                                                  </tr>
                                                  <!--end tr-->
                                              </thead>
                                              <tbody
                                                @foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->products() as $product)
                                                  <tr class="byekan">
                                                      <td><a href="{{ route('product', ['shop'=>$product->shop->english_name, 'id'=>$product->id]) }}" target="_blank"><img class="product-img" src="{{ $product->image['80,80']}}" alt="user"></a></td>
                                                      <td><a href="{{ route('product', ['shop'=>$product->shop->english_name, 'id'=>$product->id]) }}" target="_blank">{{ $product->title }}</a></td>
                                                      <td class="d-flex justify-content-between align-items-center h-25vh">{{ jdate($purchase->created_at) }} @if($product->type == 'file')
                                                          <div class="icon-show">
                                                              <a href="{{ route('file-download', ['shop'=>$product->shop()->first()->english_name, 'id'=>$product->id, 'purchaseId'=>$purchase->id]) }}" id="downloadFile"><i class="fa fa-download text-success mr-1 button font-15"></i>
                                                              </a>
                                                          </div>
                                                          @endif
                                                      </td>
                                                  </tr>
                                                @endforeach

                                                  <!--end tr-->
                                              </tbody>
                                          </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @php $i++ @endphp
                            @endforeach
                        </div>
                        <!--end card-body-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <!-- end row -->
                  @endsection
                  @section('pageScripts')
                  @stop
