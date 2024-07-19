@extends('layouts.master')

@section('content')
    @include('includes.nav')

    @include('includes.youtube')

    @include('includes.result')

    {{--@include('includes.statistics')--}}

    @include('includes.reviews')

    @include('includes.services')

    @include('includes.gallery')

    @include('includes.map')
@endsection
