@extends('layouts.site')


@section('header')
    @include('site.header')
@endsection


@section('content')
    {!! $content !!}
@endsection