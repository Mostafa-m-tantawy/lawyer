@extends('layouts.vertical', ['title' => __($breadcrumb)])
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
                                    href="javascript: void(0);"> {{__($breadcrumb)}}</a></li>
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
                                <th>{{__('User')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Amount')}}</th>
                                <th>{{__('Payment Method')}}</th>
                                <th>{{__('Payment Date')}}</th>
                                <th>{{__('Note')}}</th>
                                <th style="width: 250px;">{{__('actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                {{----}}
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->payment_method}}</td>
                                    <td>{{$item->payment_date}}</td>
                                    <td>{{$item->note}}</td> <td>
                                        <a title="update" class="btn btn-info"
                                           data-toggle="modal" data-target=".updateModel"
                                           data-data="{{$item}}"
                                           data-url="{{route('general-expenses.update',[$item->id])}}"
                                        >
                                            {{__('Edit')}}
                                        </a>
                                        <form style="display: inline" method="post"
                                              action="{{route('general-expenses.destroy',[$item->id])}}">
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
@include('.generalExpenses.partial.crudeModal')

@endsection
@section('script')
    @include('.generalExpenses.partial.scripts')
@endsection
