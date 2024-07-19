@extends('layouts.app')

@section('title')
    Hesab ayarları
@endsection

@section('css')
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/dropzone/dropzone.min.css') }}"/>
@endsection

@section('content')
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        @include('includes.header')

        <!-- Main container start -->
        <div class="main-container">

            @include('back.includes.sidebar')

            <!-- Content wrapper scroll start -->
            <div class="content-wrapper-scroll">

                <!-- Main header starts -->
                <div class="main-header">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="page-icon">
                            <i class="bi bi-stickies"></i>
                        </div>
                        <div class="page-title d-none d-md-block">
                            <h5>Hesab ayarları</h5>
                        </div>
                    </div>
                </div>
                <!-- Main header ends -->

                <!-- Content wrapper start -->
                <div class="content-wrapper">
                    <div class="subscribe-header">
                        <img src="{{ asset('back/assets/images/bg.svg') }}" class="img-fluid w-100" alt="Header"/>
                    </div>
                    <div class="subscriber-body">
                        <!-- Row start -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-12">
                                <!-- Row start -->
                                <div class="row align-items-end">
                                    <div class="col-auto">
                                        <img
                                            src="{{ auth()->user()->avatar ? asset('files/avatars/'.auth()->user()->avatar) : asset('back/assets/images/profile.jpg') }}"
                                            class="img-7xx rounded-circle" id="pageAvatar"/>
                                    </div>
                                    <div class="col">
                                        <h6>admin</h6>
                                        <h4 class="m-0"
                                            id="fullNamePage">{{ auth()->user()->name.' '.auth()->user()->last_name }}</h4>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-12">
                                <div class="card light">
                                    <div class="card-body">
                                        <div class="custom-tabs-container">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                                                    <!-- Row start -->
                                                    <div class="row gx-3">
                                                        <div class="col-sm-4 col-12">
                                                            <div id="update-profile" class="mb-3">
                                                                <form action="{{ route('account.settings.store') }}"
                                                                      class="dropzone sm needsclick dz-clickable"
                                                                      id="update-profile-pic" method="post">
                                                                    @csrf
                                                                    <div class="dz-message needsclick">
                                                                        <input type="file" name="avatar" id="avatar"
                                                                               class="d-none" accept="image/*">
                                                                        <button type="button" class="dz-button"
                                                                                onclick="$('#avatar').click();">
                                                                            Şəkil yüklə
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8 col-12">
                                                            <div class="row gx-3">
                                                                <div class="col-6">
                                                                    <!-- Form Field Start -->
                                                                    <div class="mb-3">
                                                                        <label for="name" class="form-label">Ad</label>
                                                                        <input type="text" class="form-control"
                                                                               name="name"
                                                                               value="{{ auth()->user()->name }}"
                                                                               id="name"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <!-- Form Field Start -->
                                                                    <div class="mb-3">
                                                                        <label for="last_name"
                                                                               class="form-label">Soyad</label>
                                                                        <input type="text" class="form-control"
                                                                               name="last_name"
                                                                               value="{{ auth()->user()->last_name }}"
                                                                               id="last_name"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <!-- Form Field Start -->
                                                                    <div class="mb-3">
                                                                        <label for="password"
                                                                               class="form-label">Şifrə</label>
                                                                        <input type="password" class="form-control"
                                                                               id="password" name="password"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Row end -->
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 justify-content-end">
                                                <button type="button" class="btn btn-success" id="profileUpdater">
                                                    Yadda saxla
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>
                </div>
                <!-- Content wrapper end -->

            </div>
            <!-- Content wrapper scroll end -->

            @include('includes.footer')

        </div>
        <!-- Main container end -->

    </div>
    <!-- Page wrapper end -->
@endsection


@section('js')
    <script !src="">
        $(document).ready(function () {
            $('#avatar').change(function () {
                let formData = new FormData();
                formData.append('avatar', $('#avatar')[0].files[0]);
                formData.append('action', 'avatar');

                $.ajax({
                    url: '{!! route('account.settings.store') !!}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $('#headerAvatar, #pageAvatar').attr('src', response.src);
                        toastr.success('Profil şəkili uğurla əlavə edildi');
                    },
                    error: function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, value) {
                            toastr.error(value);
                        })
                    }
                });
            });

            $('#profileUpdater').click(function () {
                let formData = {
                    name: $('#name').val(),
                    last_name: $('#last_name').val(),
                    password: $('#password').val(),
                    'action': 'credentials'
                };

                $.ajax({
                    url: '{!! route('account.settings.store') !!}',
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $('#fullNameHeader,#fullNamePage').html(response.fullName);
                        toastr.success('Profil məlumatları yadda saxlanıldı');
                    },
                    error: function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, value) {
                            toastr.error(value);
                        })
                    }
                });
            });
        });
    </script>
@endsection
