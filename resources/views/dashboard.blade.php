@extends('layouts.vertical', ['title' => __('Dashboard')])
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


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box widget-inline">
                                    <div class="row">
                                        <div class="col-sm-6 col-xl-3">
                                            <div class="p-2 text-center">
                                                <i class="mdi mdi-account-group text-danger mdi-24px"></i>
                                                <h3><span data-plugin="counterup">{{$casesCount}}</span></h3>
                                                <p class="text-muted font-15 mb-0">{{__('#Cases')}}</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xl-3">
                                            <div class="p-2 text-center">
                                                <i class="mdi mdi-currency-usd text-success mdi-24px"></i>
                                                <h3>$ <span data-plugin="counterup">{{$total_paid}}</span></h3>
                                                <p class="text-muted font-15 mb-0">{{__('paid')}}</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xl-3">
                                            <div class="p-2 text-center">
                                                <i class="mdi mdi-currency-usd text-success mdi-24px"></i>
                                                <h3>$ <span data-plugin="counterup">{{$total_pending}}</span></h3>
                                                <p class="text-muted font-15 mb-0">{{__('Pending')}}</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xl-3">
                                            <div class="p-2 text-center">
                                                <i class="mdi mdi-currency-usd text-success mdi-24px"></i>
                                                <h3>$ <span data-plugin="counterup">{{$total_general_expenses}}</span></h3>
                                                <p class="text-muted font-15 mb-0">{{__('General Expenses')}}</p>
                                            </div>
                                        </div>

                                    </div> <!-- end row -->
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>

                <div class="card">

                    <div class="card-body">

                        <div class="card-title">
                            <h5>  {{__('Cases')}}</h5>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead class="thead-light">
                                        <tr>
                                            <th>{{__('ID')}}</th>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Court')}}</th>
                                            <th>{{__('Total Amount')}}</th>
                                            <th>{{__('Paid')}}</th>
                                            <th>{{__('Pending')}}</th>
                                            <th>{{__('Expenses')}}</th>
                                            <th>{{__('Commission')}}</th>
                                            <th style="width: 250px;">{{__('actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cases as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->court?$item->court->name:''}}</td>
                                                <td>{{$item->total_amount}}</td>
                                                <td>{{$item->total_paid}}</td>
                                                <td>{{$item->total_pending}}</td>
                                                <td>{{$item->total_expenses}}</td>
                                                <td>{{$item->total_commissions}}</td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                       href="{{route('cases.show',[$item->id])}}">
                                                        {{__('View')}}
                                                    </a>
                                                    <a title="update" class="btn btn-info"
                                                       data-toggle="modal" data-target=".updateModel"
                                                       data-data="{{$item}}"
                                                       data-url="{{route('cases.update',[$item->id])}}"
                                                    >
                                                        {{__('Edit')}}
                                                    </a>
                                                    <form style="display: inline" method="post"
                                                          action="{{route('cases.destroy',[$item->id])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"> {{__('delete')}}</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>

                                    @if($cases->count()==0)
                                        <h5 class="text-center">{{__('There is no data in this table!')}}</h5>
                                    @endif
                                </div>
                                {{$cases->appends(['cases' => $cases->currentPage()])->links()}}

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div class="card-title">
                            <h5>     {{__('General Expenses')}}</h5>
                        </div>

                        <div class="row">
                            <div class="col-12">
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
                                {{$data->appends(['general_expenses' => $data->currentPage()])->links()}}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')
@endsection
