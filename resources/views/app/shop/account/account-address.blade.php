@extends('app.shop.2.layouts.master-user')

@section('headerScripts')

@endsection

@section('content')
<div id="tt-pageContent">
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <h1 class="tt-title-subpages noborder">آدرس ها</h1>
            <div class="tt-shopping-layout">
                <h2 class="tt-title">آدرس های شما</h2>
                <div class="tt-wrapper"><a href="{{ route('user-address.create') }}" class="btn">اضافه کردن آدرس جدید</a>
                    @php $i = 1;
                    @endphp
                    @foreach ($user_addresses as $user_addresse)
                    <div class="tt-wrapper">
                        <h3 class="tt-title">آدرس شماره {{ $i }}</h3>
                        <div class="tt-table-responsive">
                            <table class="tt-table-shop-02">
                                <tbody>
                                    <tr>
                                        <td class="iranyekan font-weight-bold">شهر :</td>
                                        <td>{{ $user_addresse->city }}</td>
                                    </tr>
                                    <tr>
                                        <td class="iranyekan font-weight-bold">استان :</td>
                                        <td>{{ $user_addresse->province }}</td>
                                    </tr>
                                    <tr>
                                        <td class="iranyekan font-weight-bold">کد پستی :</td>
                                        <td>{{ $user_addresse->zip_code }}</td>
                                    </tr>
                                    <tr>
                                        <td class="iranyekan font-weight-bold">نشانی :</td>
                                        <td>{{ $user_addresse->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tt-shop-btn">
                            <a class="btn-link" href="{{ route('user-address.edit', $user_addresse->id) }}">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22 22" style="enable-background:new 0 0 22 22;" xml:space="preserve">
                                    <g>
                                        <path d="M2.3,20.4C2.3,20.4,2.3,20.4,2.3,20.4C2.2,20.4,2.2,20.4,2.3,20.4c-0.2,0-0.2,0-0.3,0c-0.1,0-0.1-0.1-0.2-0.1
									c-0.1-0.1-0.1-0.2-0.1-0.3c0-0.1,0-0.2,0-0.3l0.6-5c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0-0.1,0-0.1
									c0,0,0-0.1,0.1-0.1L14.6,2.1C15,1.7,15.4,1.6,16,1.6c0.5,0,1,0.2,1.3,0.5l2.6,2.6c0.4,0.4,0.5,0.8,0.5,1.3c0,0.5-0.2,1-0.5,1.3
									L7.7,19.6c0,0-0.1,0-0.1,0.1c0,0-0.1,0-0.1,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0L2.3,20.4z M2.9,19.1l2.9-0.4
									l-2.6-2.6L2.9,19.1z M3.7,14.8L5,16.1l9.7-9.7L13.5,5L3.7,14.8z M7.2,18.3L17,8.5l-1.3-1.3L5.9,17L7.2,18.3z M15.5,3l-1.2,1.2
									l3.5,3.5L19,6.5c0.1-0.1,0.2-0.3,0.2-0.4c0-0.2-0.1-0.3-0.2-0.4L16.4,3c-0.1-0.1-0.3-0.2-0.4-0.2C15.8,2.8,15.6,2.8,15.5,3z" />
                                    </g>
                                </svg> ویرایش </a>

                            <a class="btn-link" href="" id="removeBrand" data-name="{{ $user_addresse->address }}" data-id="{{ $user_addresse->id }}"><i class="far fa-trash-alt  font-15"><i class="icon-h-02"></i>حذف</a></div>

                    </div>
                    @php $i++;
                    @endphp

                    @endforeach


                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('footerScripts')
    <script>
        $(document).on('click', '#removeBrand', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            swal(` ${'حذف دسته بندی:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
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
