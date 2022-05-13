@extends('layouts.frontend')
@section('title','Home')
@section('content')
    @include('banner.HomeBanner')
    @include('user.LatestProduct')
    @include('user.feature')

@endsection
