@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<div class="page-content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <div class="float-right">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item "> {{ __('dashboard-shop-product-comment.leftCurrentPage1') }} </li>
                     <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('dashboard-shop-product-comment.leftCurrentPage2') }}</a></li>
                  </ol>
               </div>
               {{--
               <h4 class="page-title">لیست محصولات دسته بندی شماره یک</h4>
               --}}
            </div>
            <!--end page-title-box-->
         </div>
         <!--end col-->
      </div>
      @include('dashboard.layouts.errors')
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="mt-0 header-title">{{ __('dashboard-shop-product-comment.listNazaraatTitle') }}</h4>
                  <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                     <p class="text-muted mb-4 font-13">{{ __('dashboard-shop-product-comment.listNazaraatDesc') }}
                     </p>
                     <div class="row">
                        <div class="col-sm-12">
                           <ul style="margin-bottom: 50px;" class="nav nav-pills" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active" data-toggle="tab" href="#kt_tabs_3_1">{{ __('dashboard-shop-product-comment.listNazaraatBox1') }}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#kt_tabs_3_3">{{ __('dashboard-shop-product-comment.listNazaraatBox2') }}</a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="kt_tabs_3_1" role="tabpanel">
                                 <div class="searchBox">
                                    <input type="text" id="myInputTextField" class="searchInput">
                                    <button class="searchButton" href="#">
                                    <i class="fa fa-search"></i>
                                    </button>
                                 </div>
                                 <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer text-center" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                    aria-describedby="datatable_info">
                                    <thead>
                                       <tr role="row">
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">{{ __('dashboard-shop-product-comment.listNazaraatItem1') }}</th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 100px;">
                                             {{ __('dashboard-shop-product-comment.listNazaraatItem2') }}
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 100px;">
                                            {{ __('dashboard-shop-product-comment.listNazaraatItem3') }}
                                          </th>
                                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 400px;">{{ __('dashboard-shop-product-comment.listNazaraatItem4') }}</th>
                                       </tr>
                                    </thead>
                                    <tbody class="byekan">
                                       @foreach($comments->where('approved', '0' ) as $comment)
                                       <tr role="row" class="odd icon-hover hover-color">
                                          <td style="width:5%"><a target="_blank" href="{{ route('product', ['shop' => $comment->shop->english_name, 'product' => $comment->commentable->id]) }}">{{ $comment->commentable->title }}</a>
                                          </td>
                                          <td>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</td>
                                          <td>{{ jdate($comment->created_at) }}</td>
                                          <td class="d-flex justify-content-between">
                                             {{ $comment->comment }}
                                             <div class="d-none icon-show">
                                                @if($comment->approved == 0)
                                                <a href="{{ route('comment.approve', [ $comment->id,  $comment->commentable]) }}"
                                                   class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="{{ __('dashboard-shop-product-comment.listNazaraatItem5') }}"><i style="color: #03c9a9;" class="fa fa-check"></i>
                                                </a>
                                                @endif
                                                <a data-toggle="modal" data-target="#m_modal_{{ $comment->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="{{ __('dashboard-shop-product-comment.listNazaraatItem6') }}">
                                                <i style="color: #19b5fe" class="fa fa-reply">
                                                </i>
                                                </a>
                                                <a href="" data-id="{{$comment->id}}" data-commentable="{{ $comment->commentable->id }}"
                                                   class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill button" title="{{ __('dashboard-shop-product-comment.listNazaraatItem7') }} "> <i style="color: #db0a5b" class="fa fa-times"></i> </a>
                                             </div>
                                          </td>
                                       </tr>
                                       <!--begin::Modal-->
                                       <div style="" class="modal fade" id="m_modal_{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg" role="document">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard-shop-product-comment.replyNazaraatTitle') }}</h5>
                                                   <button style="font-family:LineAwesome!important" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                   </button>
                                                </div>
                                                <div class="modal-body">
                                                   <form action="/comment/answer" method="post">
                                                      @csrf
                                                      <div class="form-group">
                                                         <label for="message-text" class="form-control-label iranyekan">{{ __('dashboard-shop-product-comment.replyNazaraatItem1') }}:</label>
                                                         <textarea class="form-control iranyekan" name="comment" id="comment"></textarea>
                                                         <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                         <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                                         <input type="hidden" name="commentable_id" value="{{ $comment->commentable->id }}">
                                                         <input type="hidden" name="approved" value="1">
                                                         <input type="hidden" name="commentable_type" value="{{ get_class($comment->commentable) }}">
                                                      </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">{{ __('dashboard-shop-product-comment.replyNazaraatItem2') }}</button>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                       <!--end::Modal-->
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                              <div class="tab-pane" id="kt_tabs_3_3" role="tabpanel">
                                 <div class="searchBox">
                                    <input type="text" id="myInputTextField1" class="searchInput">
                                    <button class="searchButton" href="#">
                                    <i class="fa fa-search"></i>
                                    </button>
                                 </div>
                                 <table id="datatable1" class="table table-bordered dt-responsive nowrap dataTable no-footer text-center" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                    aria-describedby="datatable_info">
                                    <thead>
                                       <tr role="row">
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">محصول</th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 100px;">
                                             کاربر
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 100px;">
                                             تاریخ درج
                                          </th>
                                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 400px;">متن نظر</th>
                                       </tr>
                                    </thead>
                                    <tbody class="byekan">
                                       @foreach($comments->where('approved', '1' ) as $comment)
                                       <tr role="row" class="odd icon-hover hover-color">
                                          <td style="width:5%"><a target="_blank" href="{{ route('product', ['shop' => $comment->shop->english_name, 'product' => $comment->commentable->id]) }}">{{ $comment->commentable->title }}</a>
                                          </td>
                                          <td>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</td>
                                          <td>{{ jdate($comment->created_at) }}</td>
                                          <td class="d-flex justify-content-between">
                                             {{ $comment->comment }}
                                             <div class="d-none icon-show">
                                                @if($comment->approved == 0)
                                                <a href="{{ route('comment.approve', [ $comment->id,  $comment->commentable]) }}"
                                                   class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="تایید"><i style="color: #03c9a9;" class="fa fa-check"></i>
                                                </a>
                                                @endif
                                                <a data-toggle="modal" data-target="#m_modal_{{ $comment->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="پاسخ">
                                                <i style="color: #19b5fe" class="fa fa-reply">
                                                </i>
                                                </a>
                                                <a href="" data-id="{{$comment->id}}" data-commentable="{{ $comment->commentable->id }}"
                                                   class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill button" title="حذف "> <i style="color: #db0a5b" class="fa fa-times"></i> </a>
                                             </div>
                                          </td>
                                       </tr>
                                       <!--begin::Modal-->
                                       <div style="" class="modal fade" id="m_modal_{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg" role="document">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">پاسخ به نظر</h5>
                                                   <button style="font-family:LineAwesome!important" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                   </button>
                                                </div>
                                                <div class="modal-body">
                                                   <form action="/comment/answer" method="post">
                                                      @csrf
                                                      <div class="form-group">
                                                         <label for="message-text" class="form-control-label iranyekan">متن
                                                         پاسخ:</label>
                                                         <textarea class="form-control iranyekan" name="comment" id="comment"></textarea>
                                                         <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                         <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                                         <input type="hidden" name="commentable_id" value="{{ $comment->commentable->id }}">
                                                         <input type="hidden" name="approved" value="1">
                                                         <input type="hidden" name="commentable_type" value="{{ get_class($comment->commentable) }}">
                                                      </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">ثبت</button>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                       <!--end::Modal-->
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end col -->
   </div>
</div>
<!-- Attachment Modal -->
@endsection
@section('pageScripts')
<script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
<script>
   oTable = $('#datatable').DataTable({
       "order": [
           [2, "desc"]
       ]
   }); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
   oTable = $('#datatable1').DataTable({
       "order": [
           [2, "desc"]
       ]
   }); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
   $('#myInputTextField').keyup(function() {
       oTable.search($(this).val()).draw();
   })
   $('#myInputTextField1').keyup(function() {
       oTable.search($(this).val()).draw();
   })
</script>
<script>
   $(document).on('click', '.button', function(e) {
       e.preventDefault();
       var id = $(this).data('id');
       swal("آیا اطمینان دارید؟", {
               dangerMode: true,
               icon: "warning",
               buttons: ["انصراف", "حذف"],

           })
           .then(function(isConfirm) {
               if (isConfirm) {
                   $.ajax({
                       type: "post",
                       url: "{{url('dashboard/shop/comment/delete')}}",
                       data: {
                           id: id,
                           "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                       },
                       success: function(data) {
                           var url = document.location.origin + "/dashboard/shop/product-comments";
                           location.href = url;
                       }
                   });
               } else {
                   toastr.warning('لغو شد.', '', []);
               }
           });
   });
</script>
@if(session()->has('flashModal'))
<script>
   $('#AddProductCategoryModal').modal('show');
</script>
@endif
@stop
