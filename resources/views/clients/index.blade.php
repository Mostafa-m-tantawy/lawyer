@extends('layouts.vertical', ['title' => __('Clients')])
@section('styles')
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
                                    href="javascript: void(0);"> {{__('Clients')}}</a></li>
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

                    <!--begin: Datatable -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead class="thead-light">
                            <tr>

                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone')}}</th>
                                <th>{{__('Address')}}</th>
                                <th>{{__('National ID')}}</th>
                                <th>{{__('Passport ID')}}</th>
                                <th>{{__('actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                {{----}}
                                <tr>

                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->national_id}}</td>
                                    <td>{{$item->passport_id}}</td>
                                    <td>
                                        <a  class="btn btn-primary"
                                           href="{{route('clients.show',[$item->id])}}">
                                            {{__('View')}}
                                        </a>
                                        <a title="update" class="btn btn-info"
                                           data-toggle="modal" data-target=".updateModel"
                                           data-data="{{$item}}"
                                           data-url="{{route('clients.update',[$item->id])}}"
                                        >
                                            {{__('Edit')}}
                                        </a>
                                        <form style="display: inline" method="post"
                                              action="{{route('clients.destroy',[$item->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"> {{__('delete')}}</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                                </table>

                                @if($data->count()==0)
                                    <h5 class="text-center">{{__('There is no data in this table!')}}</h5>
                                @endif
                            </div>

                            {{$data->links()}}

                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
@include('.clients.partial.crudeModal')

@endsection
@section('script')
    @include('.clients.partial.scripts')
@endsection
