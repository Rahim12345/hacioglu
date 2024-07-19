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

                <div class="container mt-5 card">
                    <h2>Əvvəl - Sonra</h2>
                    <form id="pairs-form" enctype="multipart/form-data">
                        @csrf
                        <div id="pairs-container">
                            <div class="pair-item mb-4">
                                <div class="form-row">
{{--                                    <div class="form-group col-md-3">--}}
{{--                                        <label for="before_name">Before Name</label>--}}
{{--                                        <input type="text" class="form-control" name="before_name[]" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-md-3">--}}
{{--                                        <label for="after_name">After Name</label>--}}
{{--                                        <input type="text" class="form-control" name="after_name[]" required>--}}
{{--                                    </div>--}}
                                    <div class="form-group col-md-3">
                                        <label for="before_image">Əvvəl</label>
                                        <input type="file" class="form-control before-image-input" name="before_image[]" accept="image/*" required>
                                        <img src="" alt="Before Image Preview" class="img-thumbnail mt-2 before-image-preview" style="display: none; max-width: 150px;">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="after_image">Sonra</label>
                                        <input type="file" class="form-control after-image-input" name="after_image[]" accept="image/*" required>
                                        <img src="" alt="After Image Preview" class="img-thumbnail mt-2 after-image-preview" style="display: none; max-width: 150px;">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger mt-1 float-end remove-pair">Sil</button>
                            </div>
                        </div>
                        <button type="button" id="add-pair" class="btn btn-secondary"><i class="fa fa-plus"></i></button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                    </form>
                    <div id="results" class="mt-5">
                        <table class="table">
                            <tr>
                                <td>Əvvəl</td>
                                <td>Sonra</td>
                                <td></td>
                            </tr>
                            @foreach($pairs as $pair)
                                <tr>
                                    <td><img src="{{ asset('images/'.$pair->before_image) }}" style="width: 100px;height: 100px" alt=""></td>
                                    <td><img src="{{ asset('images/'.$pair->after_image) }}" style="width: 100px;height: 100px" alt=""></td>
                                    <td>
                                        <form action="{{ route('pairs.destroy',$pair->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger show_confirm" type="submit">
                                                Sil
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
            <!-- Content wrapper scroll end -->

            @include('includes.footer')

        </div>
        <!-- Main container end -->

    </div>
    <!-- Page wrapper end -->
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            function readURL(input, previewElement) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        previewElement.attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(document).on('change', '.before-image-input', function() {
                readURL(this, $(this).next('.before-image-preview'));
            });

            $(document).on('change', '.after-image-input', function() {
                readURL(this, $(this).next('.after-image-preview'));
            });

            $('#add-pair').click(function() {
                var pairItem = $('.pair-item:first').clone();
                pairItem.find('input').val('');
                pairItem.find('.img-thumbnail').attr('src', '').hide();
                $('#pairs-container').append(pairItem);
            });

            $(document).on('click', '.remove-pair', function() {
                if ($('.pair-item').length > 1) {
                    $(this).closest('.pair-item').remove();
                }
            });

            $('#pairs-form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: '{{ route("pairs.store") }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#results').html(response);
                        $('#pairs-form')[0].reset();
                        $('.img-thumbnail').hide();

                        window.location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
