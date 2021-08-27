@extends('layouts.vertical', ['title' => __('dashboard')])
@section('styles')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!-- end row -->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title-right">
                        <a href="#" data-toggle="modal" data-target="#newModel"
                           class="btn btn-primary btn-rounded waves-effect waves-light mb-3"><i
                                class="mdi mdi-plus"></i> {{__('new record')}}</a>
                    </h4>
                    <div class="page-title">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('admin')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="javascript: void(0);"> {{__('dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('index')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div >

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')
@endsection
