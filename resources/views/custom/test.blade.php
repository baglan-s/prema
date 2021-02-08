@extends('layouts.custom')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="content">
                <div class="content-text">test text</div>
                <div class="content-wrapper"></div>
            </div>
        </div>
    </div>
</div>
<style>
    .content {
        position: relative;
        padding: 20px 0;
        overflow-x: hidden;
    }
    .content-wrapper {
        position: absolute;
        left: -38px;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: #cdcdcd;
        z-index: 1;
        -webkit-transform: skew(-50deg);
        -moz-transform: skew(-50deg);
        -ms-transform: skew(-50deg);
        -o-transform: skew(-50deg);
        transform: skew(-50deg);
    }
    .content-text {
        position: relative;
        z-index: 2;
    }
</style>

@endsection