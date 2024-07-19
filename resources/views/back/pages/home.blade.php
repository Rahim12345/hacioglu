@extends('layouts.app')

@section('title')
    Əsas səhifə
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <!-- Content wrapper start -->
                    <div class="content-wrapper">
                        <!-- Row start -->
                        <div class="row gx-3">
                            <div class="col-sm-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <label class="form-label" for="telfon">Telfon</label>
                                            <input type="text" class="form-control" placeholder="+994775829989" id="telfon" name="telfon" value="{{ \App\Helpers\Contactor::get('telfon') }}">
                                            @error('telfon')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <label class="form-label" for="telfon_oxunaqli">Telfon oxunaqlı</label>
                                            <input type="text" class="form-control" placeholder="+994 (77) 582-99-89" id="telfon_oxunaqli" name="telfon_oxunaqli" value="{{ \App\Helpers\Contactor::get('telfon') }}">
                                            @error('telfon_oxunaqli')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" class="form-control" placeholder="example@gmail.com" id="email" name="email" value="{{ \App\Helpers\Contactor::get('email') }}">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <label class="form-label" for="address_az">Ünvan(az)</label>
                                            <input type="text" class="form-control" placeholder="Bakı ş, Nəsimi ray, D.Əliyeva 239" id="address_az" name="address_az" value="{{ \App\Helpers\Contactor::get('address_az') }}">
                                            @error('address_az')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <label class="form-label" for="address_en">Ünvan(en)</label>
                                            <input type="text" class="form-control" placeholder="D. Aliyeva 239, Nasimi district, Baku city" id="address_en" name="address_en" value="{{ \App\Helpers\Contactor::get('address_en') }}">
                                            @error('address_en')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <label class="form-label" for="address_ru">Ünvan(ru)</label>
                                            <input type="text" class="form-control" placeholder="г. Баку, Насиминский район, ул. Д. Алиева, 239" id="address_ru" name="address_ru" value="{{ \App\Helpers\Contactor::get('address_ru') }}">
                                            @error('address_ru')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <label class="form-label" for="youtube_link">Youtube tanıtım linki</label>
                                            <input type="text" class="form-control" id="youtube_link" name="youtube_link" value="{{ \App\Helpers\Contactor::get('youtube_link') }}">
                                            @error('youtube_link')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <label class="form-label" for="lat">Coğrafi enlik</label>
                                            <input type="text" class="form-control" id="lat" name="lat" value="{{ \App\Helpers\Contactor::get('lat') }}">
                                            @error('lat')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <label class="form-label" for="long">Coğrafi uzunluq</label>
                                            <input type="text" class="form-control" id="long" name="long" value="{{ \App\Helpers\Contactor::get('long') }}">
                                            @error('long')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->

                        <div class="row gx-3">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary w-100">Yadda saxla</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Content wrapper end -->
                </form>

            </div>
            <!-- Content wrapper scroll end -->

            @include('back.includes.footer')

        </div>
        <!-- Main container end -->

    </div>
    <!-- Page wrapper end -->
@endsection


@section('js')

@endsection
