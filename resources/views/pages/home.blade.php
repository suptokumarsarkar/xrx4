@extends('layouts.main')

@section('title', '22Softwares - The solution for every thought')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')

@include('components.topBar.contact_top_bar')
@include('components.header.header')


@include('components.blocks.front')
@include('components.blocks.topBrands')
@include('components.blocks.onDemandServices')
@include('components.blocks.inviteLearn')
@include('components.blocks.targetBusiness')
@include('components.blocks.whatAreYouWaitingFor')

@include('components.blocks.footer')

@endsection