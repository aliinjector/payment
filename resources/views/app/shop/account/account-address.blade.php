@extends('app.shop.account.layouts.master')
@section('content')

    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <div class="">

                <h2 class="">آدرس های شما</h2>
                <div class="d-flex justify-content-end py-4">

                <a href="{{ route('user-address.create') }}">
                <button class="btn btn-primary">
              افزودن آدرس جدید
              </button>
            </div>

            </a>
            @if($user_addresses->count() > 0)

                    <div class="pb-5 table-responsive">
                      <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                        aria-describedby="datatable_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                                </th>

                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">استان
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شهر
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">کد پستی
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شماره تماس
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نشانی
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">عملیات
                                </th>
                            </tr>
                        </thead>
                        <tbody class="iranyekan">
                          @php
                            $id = 1;
                          @endphp
                          @forelse ($user_addresses as $user_addresse)
                            <tr role="row" class="odd">
                              <td>{{ $id }}</td>
                              <td>{{ $user_addresse->province }}</td>
                                <td>{{ $user_addresse->city }}</td>
                                <td>{{ $user_addresse->zip_code }}</td>
                                <td>{{ $user_addresse->tel }}</td>
                                <td>{{ $user_addresse->address }}</td>
                                <td>
                                      <div class="icon-show row">
                                          <a href="{{ route('user-address.edit', $user_addresse->id) }}" title="ویرایش آدرس" id="edit"><i class="fas fa-edit text-warning p-1"></i>
                                          </a>
                                            <a class="btn-link" href="" title="حذف آدرس" id="removeAddress" data-name="{{ $user_addresse->address }}" data-id="{{ $user_addresse->id }}"><i class="far fa-trash-alt text-danger p-1"></i></a>
                                      </div>
                                </td>
                            </tr>
                            @php
                              $id ++
                            @endphp
                          @empty
                            <tr>
                                <td class="byekan">رکوردی پیدا نشد</td>
                              </tr>
                          @endforelse

                        </tbody>
                    </table>
                  @else
                    <div class="row justify-content-center p-5">
                      <h4 class="text-danger">آدرسی ثبت نشده است</h4>
                    </div>
                  @endif
                  </div>
                </div>
            </div>
        </div>

  <script src="/app/shop/1/assets/js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
  <link rel="stylesheet" href="/app/shop/2/css/custom.css">
  @toastr_js
  @toastr_render
  @include('sweet::alert')
  @yield('footerScripts')
  <script src="{{url('stats/script.js')}}"></script>
  <script>
        $(document).on('click', '#removeAddress', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            swal(` ${'حذف آدرس:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                    dangerMode: true,
                    icon: "warning",
                    buttons: ["انصراف", "حذف"],
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "post",
                            url: "{{url('/user-address/delete')}}",
                            data: {
                                id: id,
                                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                            },
                            success: function(data) {
                                var url = document.location.origin + "/user-address/";
                                location.href = url;
                            }
                        });
                    } else {
                        toastr.warning('لغو شد.', '', []);
                    }
                });
        });
    </script>
  @endsection
