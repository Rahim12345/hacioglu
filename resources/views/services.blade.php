@extends('layouts.master')

@section('css')
    <style>
        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            section.services-section.bg-light {
                margin-top: 100px;
            }

            .mobile-12 {
                width: 100%;
            }

            div.imageReveal {
                width: 400px !important;
                margin: 0;
            }
        }

    </style>
@endsection

@section('content')
    @include('includes.nav')

    <section class="services-section bg-light">
        <div class="col-md-6 col-sm-12 mobile-12">
            <h2>{{ $serve->{'name_'.app()->getLocale()} }}</h2>
            <div class="tn-atom">
                {!! $serve->{'text_'.app()->getLocale()} !!}
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mobile-12">
            <section class="result-show bg-light">
                <div class="row small">
                    <div class="imageRevealBig">
                        <img
                            src="{{ asset('files/services/'.$serve->before_photo) }}"
                            title="@lang('static.evvel')"
                        />
                        <img
                            src="{{ asset('files/services/'.$serve->after_photo) }}"
                            title="@lang('static.sonra')"
                        />
                    </div>
                </div>
            </section>
        </div>
    </section>

    @include('includes.services')

    @include('includes.map')
@endsection
