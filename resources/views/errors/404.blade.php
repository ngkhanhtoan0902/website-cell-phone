@extends('layouts.index')
@section('title','404 Not Found')
@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height:100vh"  >
    <div class="row" data-aos="animation-translate-up" data-aos-duration="500">
        <div class="col-12 text-center">
            <div class=" bg-error mx-auto position-relative">
                <img class="animation-up-down mt-50 position-absolute" src="/themes/writerzen/img/cloud.png" width="132" style="left: 0;bottom: 50px;">
                <img class="animation-up-down mt-50 " src="/themes/writerzen/img/hero.png" width="185" />
                <img class="animation-down-up mt-50 position-absolute" src="/themes/writerzen/img/cloud.png" width="132" style="right: 0;top: 15px;">
            </div>
        </div>
        <div class="col-12 text-center my-40 px-sm-20">
            <div class="h3 text-center text-black">404 NOT FOUND!</div>
            <div class="h5 text-gray fw-semibold">Oops! The page you’re looking for could not be found.</div>
        </div>
        <div class="col-12 text-center">
            <a class="btn btn-primary-outline" href="/" style="border:1px">
                <i class="fal fa-angle-left"></i>
                Back to WriterZen
            </a>
        </div>
    </div>
</div>

<style>
    header , footer{
            display: none;
        }
    
</style>
@endsection