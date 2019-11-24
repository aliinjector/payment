@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<style>
    .dz-image > img {
        width: 100%!important;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> گالری تصاویر محصول </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    {{-- <h4 class="page-title">لیست محصولات دسته بندی شماره یک</h4> --}}
                </div>

                <div class="text-right mt-4">
                    <a href="{{ route('product-list.index') }}" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded"> بازگشت به لیست محصولات</a>
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
                        <h4 class="mt-2 mb-4 header-title">تصاویر مربوط به {{ $product->title }}</h4>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">

                                    <link rel="stylesheet" href="/dashboard/assets/plugins/dropzone/dropzone.min.css">
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                    <script src="/dashboard/assets/plugins/dropzone/dropzone.js"></script>

                                    <form method="post" action="{{ url('/dashboard/shop/image/upload/store/' . collect(request()->segments())->last() )}}" enctype="multipart/form-data"
                                          class="dropzone" id="dropzone">
                                        <div class="dz-message" data-dz-message><span>جهت افزودن تصویر به گالری، اینجا کلیک کنید</span></div>
                                        @csrf
                                    </form>



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


        <script type="text/javascript">
            Dropzone.options.dropzone =
                {

            maxFilesize: 2,
                    renameFile: function(file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time+file.name;
                    },
                    acceptedFiles: ".jpeg,.jpg,.png,.gif,.PNG,.JPG",
                    addRemoveLinks: true,
                    timeout: 50000,
                    maxFiles: 4,
                    removedfile: function(file)
                    {
                        var name = file.name;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            url: '{{ url("/dashboard/shop/image/delete") }}',
                            data: {filename: name},
                            success: function (data){
                                console.log("File has been successfully removed!!");
                            },
                            error: function(e) {
                                console.log(e);
                            }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },

                    init: function () {

                                @foreach($galleries as $gallery)
                                var mockFile = {name: "{{ url("$gallery->filename") }}", size: 12345, type: 'image/jpeg'};
                                    this.options.addedfile.call(this, mockFile);
                                    this.options.thumbnail.call(this, mockFile, "{{ url("$gallery->filename") }}");
                                    mockFile.previewElement.classList.add('dz-success');
                                    mockFile.previewElement.classList.add('dz-complete');
                                @endforeach


                    }
                };


        </script>



    @if(session()->has('flashModal'))
        <script>
            $('#AddProductCategoryModal').modal('show');
        </script>


        @endif
        @stop
