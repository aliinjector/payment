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
                            <li class="breadcrumb-item "> نظرات </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    {{-- <h4 class="page-title">لیست محصولات دسته بندی شماره یک</h4> --}}
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>


        @include('dashboard.layouts.errors')

        <div class="modal fade bd-example-modal-xl" id="AddProductCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">افزودن دسته بندی جدید</h5>
                        <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <form action="{{ route('product-category.store', ['continue', 1]) }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" placeholder="مثال: ورزشی">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد دسته بندی">
                                </div>
                            </div>
                            <!--end form-group-->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger rounded" data-dismiss="modal">انصراف</button>
                        <div class="group">
                            <button type="submit" name="action" value="justSave" class="btn btn-primary rounded">ثبت درخواست</button>
                            <button type="submit" name="action" value="saveAndContinue" class="btn btn-primary rounded">ثبت درخواست و ادامه </button>
                        </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">نظر ها</h4><div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">





                                  <div class="searchBox">
                                    <input type="text" id="myInputTextField" class="searchInput">
                                      <button class="searchButton" href="#">
                                          <i class="fa fa-search"></i>
                                      </button>
                                  </div>






                                    <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer text-center" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">محصول</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 100px;">کاربر </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 400px;">متن نظر</th>
                                            </tr>
                                        </thead>
                                        <tbody class="byekan">
                                            @foreach($comments as $comment)
                                            <tr role="row" class="odd icon-hover hover-color">
                                                <td style="width:5%"><a target="_blank" href="{{ route('product', ['shop' => $comment->shop->english_name, 'product' => $comment->commentable->id]) }}">{{ $comment->commentable->title }}</a></td>
                                                <td>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</td>
                                                <td class="d-flex justify-content-between">{{ $comment->comment }}
                                                    <div class="d-none icon-show">
                                                        @if($comment->approved == 0)
                                                            <a href="{{ route('comment.approve', [ $comment->id,  $comment->commentable]) }}"
                                                               class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                               title="تایید"><i style="color: #03c9a9;" class="fa fa-check"></i>
                                                            </a>
                                                        @endif
                                                            <a data-toggle="modal" data-target="#m_modal_{{ $comment->id }}"
                                                               class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                               title="پاسخ">
                                                                <i style="color: #19b5fe" class="fa fa-reply">

                                                                </i>
                                                            </a>
                                                        <a href="" data-id="{{$comment->id}}" data-commentable="{{ $comment->commentable->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill button" title="حذف "> <i style="color: #db0a5b" class="fa fa-times"></i> </a>
                                                    </div>
                                                </td>
                                            </tr>



                                            <!--begin::Modal-->
                                            <div style="" class="modal fade" id="m_modal_{{ $comment->id }}" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <textarea class="form-control iranyekan" name="comment"
                                                                                  id="comment"></textarea>
                                                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                                                        <input type="hidden" name="commentable_id"
                                                                               value="{{ $comment->commentable->id }}">
                                                                        <input type="hidden" name="approved"
                                                                               value="1">
                                                                        <input type="hidden" name="commentable_type"
                                                                               value="{{ get_class($comment->commentable) }}">
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
    oTable = $('#datatable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    $('#myInputTextField').keyup(function(){
        oTable.search($(this).val()).draw() ;
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
