@extends('layouts.custom')

@section('content')

    <section class="home-block full-height">
        <div class="container">
            <div class="row choices d-flex justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{ route('update-database') }}" class="update-action d-flex align-items-center justify-content-center">
                        Update DataBase
                        <span class="last-update">last update <br> 05.02.2021</span>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ route('create-presentation') }}" class="create-action d-flex align-items-center justify-content-center">
                        Create Presentation
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{ route('new-presentation') }}" class="new-action d-flex align-items-center justify-content-center">
                        I want the new presentation
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection