@extends('layouts.app')

@section('title')
    İşlərimiz
@endsection

@section('css')
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/dropzone/dropzone.min.css') }}"/>
@endsection

@section('content')
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        @include('back.includes.header')

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
                            <h5>Şəkil əlavə edin</h5>
                        </div>
                    </div>
                </div>
                <!-- Main header ends -->

                <!-- Content wrapper start -->
                <div class="content-wrapper">
                    <div class="subscriber-body">
                        <!-- Row start -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-12">
                                <div class="card light">
                                    <div class="card-body">
                                        <div class="custom-tabs-container">
                                            <form action="{{ route('review.store') }}" method="post"
                                                  id="bannerForm">
                                                @csrf
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                                                        <!-- Row start -->
                                                        <div class="row gx-3">
                                                            <div class="col-md-12 col-12">
                                                                <div class="col-sm-4 col-md-12">
                                                                    <div class="form-group mb-3 col-md-12 float-end">
                                                                        <a href="javascript:void(0)"
                                                                           title="Banner seçin"
                                                                           class="d-block"
                                                                           onclick="document.getElementById('photo').click();"
                                                                           style="float: right"
                                                                           id="holder">
                                                                            <img id="preview-image"
                                                                                 src="{{ request('banner_id') ? asset('files/home/brands/'.$current_banner->photo) : asset('back/assets/images/bg.svg') }}"
                                                                                 class="card-img-top"
                                                                                 alt="Current Banner">
                                                                        </a>
                                                                    </div>

                                                                    <div class="form-group mb-3 col-md-12">
                                                                        <div class="input-group">
                                                                            <input id="photo"
                                                                                   class="form-control d-none"
                                                                                   type="file" name="photo"
                                                                                   accept="image/*"
                                                                                   onchange="previewFile()">
                                                                        </div>
                                                                        <small class="text-danger photo-error"></small>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12 col-12">
                                                                    <div class="row gx-3">
                                                                        <div class="col-md-4">
                                                                            <!-- Form Field Start -->
                                                                            <div class="mb-3">
                                                                                <label for="alt_az"
                                                                                       class="form-label">Alt(az)</label>
                                                                                <input type="text" class="form-control"
                                                                                       name="alt_az"
                                                                                       value="{{ request('banner_id') ? $current_banner->alt_az : '' }}"
                                                                                       id="alt_az"/>
                                                                                <small
                                                                                    class="text-danger alt_az-error"></small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <!-- Form Field Start -->
                                                                            <div class="mb-3">
                                                                                <label for="alt_en"
                                                                                       class="form-label">Alt(en)</label>
                                                                                <input type="text" class="form-control"
                                                                                       name="alt_en"
                                                                                       value="{{ request('banner_id') ? $current_banner->alt_en : '' }}"
                                                                                       id="alt_en"/>
                                                                                <small
                                                                                    class="text-danger alt_en-error"></small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <!-- Form Field Start -->
                                                                            <div class="mb-3">
                                                                                <label for="alt_ru"
                                                                                       class="form-label">Alt(ru)</label>
                                                                                <input type="text" class="form-control"
                                                                                       name="alt_ru"
                                                                                       value="{{ request('banner_id') ? $current_banner->alt_ru : '' }}"
                                                                                       id="alt_ru"/>
                                                                                <small
                                                                                    class="text-danger alt_ru-error"></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Row end -->
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 justify-content-end">
                                                        <button type="submit" class="btn btn-success"
                                                                id="profileUpdater">
                                                            Yadda saxla
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <hr>
                                        <table class="table">
                                            <tr>
                                                <td>Şəkil</td>
                                                <td></td>
                                            </tr>
                                            @foreach($banners as $banner)
                                                @if($banner->id != request('banner_id'))
                                                    <tr>
                                                        <td><img class="images" data-id="{{ $banner->id }}"
                                                                 src="{{ asset('files/home/brands/'.$banner->photo) }}"
                                                                 alt="" style="width: 500px;height: 100px;"></td>
                                                        <td>
                                                            <div class="btn-toolbar float-end">
                                                                <a href="{{ route('review.create',['banner_id'=>$banner->id]) }}"
                                                                   class="btn btn-success"><i class="fa fa-pen"></i></a>
                                                                <form action="{{ route('review.destroy',$banner->id) }}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger m-1 show_confirm"
                                                                            type="submit"
                                                                            onclick="remover($(this), `Silmək istədiyinizdən əminsiniz?`, `Təsdiqlə`, `Ləğv et`);">
                                                                        <i class="fa fa-times"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                    </div>
                    <!-- Content wrapper end -->

                </div>
                <!-- Content wrapper scroll end -->

                @include('back.includes.footer')

            </div>
            <!-- Main container end -->

        </div>
        <!-- Page wrapper end -->
        @endsection

@section('js')
    <script>
        function previewFile() {
            const preview = document.getElementById('preview-image');
            const file = document.getElementById('photo').files[0];
            const reader = new FileReader();

            reader.addEventListener("load", function () {
                // Convert the file to a base64 string and display it as the image source
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        $(document).ready(function () {
            $('#bannerForm').submit(function (e) {
                e.preventDefault();
                let formData = new FormData(this);

                formData.append('action', '{!! request('banner_id') ? 'update' : 'create' !!}');
                formData.append('banner_id', '{!! request('banner_id') !!}');

                $.ajax({
                    url: '{{ route("review.store") }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        let banner_id = '{!! request('banner_id') !!}';
                        $('#bannerForm')[0].reset();
                        $('#preview-image').attr('src', '{!! asset('back/assets/images/bg.svg') !!}');
                        toastr.success('Şəkil yadda saxlanıldı');
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
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
