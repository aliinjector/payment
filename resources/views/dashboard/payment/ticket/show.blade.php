@extends('dashboard.layouts.master')




@section('content')
    <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!--  Modal content for the above example -->



    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">پشتیبانی و تیکتینگ</a></li>
                        <li class="breadcrumb-item active">داشبورد امید شاپ</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>


    <div class="row">
        <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="mt-0 header-title pb-3">عنوان درخواست: {{$ticket->title}}</h4>
                  <a href="{{ route('ticket.buzz', $ticket->id) }}"><button style="float:left;" type="submit" class="btn btn-danger"><i class="fa fa-check-square-o"></i> BUZZ</button></a>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group row">
                              <label for="example-text-input"
                                     class="col-sm-2 col-form-label text-center">حوزه</label>
                              <div class="col-sm-10">
                                  <input disabled class="form-control" type="text" name="name" value="{{ $ticket->scope }}" id="example-text-input">
                              </div>
                          </div>


                          <div class="form-group row">
                              <label style="text-align: center" for="example-email-input"
                                     class="col-sm-2 col-form-label text-center"> وضعیت </label>
                              <div class="col-sm-10">
                                  <input disabled class="form-control" type="text" name="name" value="{{ $ticket->status }}" id="example-text-input">
                              </div>
                          </div>


                      </div>
                      <div class="col-lg-6">
                          <div class="form-group row">
                              <label for="example-search-input" class="col-sm-2 col-form-label text-center">آخرین تغییر </label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" name="url" disabled value="{{ $ticket->updated_at }}" id="example-search-input">
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="col-lg-12">

                    <div class="form-group row">
                        <label for="example-url-input" class="col-sm-2 col-form-label text-center">متن اصلی تیکت</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" disabled cols="30" rows="10">{{$ticket->description}}</textarea>
                        </div>
                    </div>


                          <div class="card">
                              <div class="card-body">
                                  <h4 class="header-title mt-0 mb-3">پاسخها: </h4>
                                  <div class="slimscroll activity-scroll">
                                      <div class="activity">


                                            @foreach ($ticket->answers as $answer)
                                              <i class="mdi mdi-checkbox-marked-circle-outline icon-success"></i>
                                              <div class="time-item">
                                                  <div class="item-info">
                                                      <div class="d-flex justify-content-between align-items-center">
                                                          <h6 class="m-0">
                                                              پاسخ شماره
                                                              {{ $loop->iteration }}
                                                              |
                                                              توسط:
                                                              {{ $answer->user->firstName . ' ' . $answer->user->lastName }}
                                                              ({{ $answer->type == 'user' ? 'کاربر' : 'پشتیبان سیستم' }})
                                                          </h6><span class="text-muted">{{ jdate($answer->created_at) }}</span></div>
                                                      <p class="text-muted mt-3"> {{ $answer->description }} </p>
                                                      <div>
                                                           َ<a href="/{{ $answer->attachment }}"><span class="badge badge-soft-secondary">دانلود فایل ضمیمه</span></a>
                                                      </div>
                                                  </div>
                                              </div>
                                            @endforeach




                                      </div>
                                      <!--end activity-->
                                  </div>
                                  <!--end activity-scroll-->
                              </div>
                              <!--end card-body-->
                          </div>
                          <!--end card-->



                  </div>


                  <div class="row">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4 class="card-title" id="basic-layout-form">درج پاسخ در تیکت </h4>
                              </div>
                              <div class="card-content collapse show">
                                  <div class="card-body">
                                      <div class="card-text">
                                      </div>
                                      <form style="font-family:Byekan" action="{{ route('ticket.answer') }}" enctype="multipart/form-data" method="post" class="form">
                                          @csrf
                                          <div class="form-body">

                                              <h4 class="form-section"><i class="fa fa-paperclip"></i> متن پاسخ</h4>

                                              <div class="form-group">
                                                  <label for="description"> پاسخ:</label>
                                                  <textarea id="description" rows="3" class="form-control" name="description" placeholder="توضیحات"></textarea>
                                                  <input type="hidden" style="display: none" name="ticket_id" value="{{ $ticket->id }}" ">
                                              </div>

                                              <div class="col-md-6">
                                                  <fieldset class="form-group">
                                                      <label for="attachment">ضمیمه فایل:</label>
                                                      <div class="custom-file">
                                                          <input type="file" name="attachment" class="custom-file-input" id="attachment">
                                                          <label class="custom-file-label" for="attachment">جهت ضمیمه فایل
                                                              یا تصویر کلیک کنید</label>
                                                      </div>
                                                  </fieldset>
                                              </div>


                                          </div>

                                          <div class="form-actions text-center p-5">
                                              <button type="submit" class="btn btn-success">
                                                  <i class="fa fa-check-square-o"></i> ثبت درخواست
                                              </button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--end card-body-->
          </div>
        </div>
        <!-- end col -->
    </div>



    <!--end row-->

@endsection


@section('pageScripts')

    <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>


@stop
