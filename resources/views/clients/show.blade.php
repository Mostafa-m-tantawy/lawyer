@extends('layouts.vertical', ['title' => __('Client Cases')])
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
                                    href="javascript: void(0);"> {{__('Cases')}}</a></li>
                            <li class="breadcrumb-item active">{{__('index')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card-box text-center">
                    <h4 class="mb-0">{{$client->name}}</h4>

                    <div class="text-left mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Name')}} :</strong>
                            <span class="ml-2">{{$client->name}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Email')}} :</strong>
                            <span class="ml-2">{{$client->email}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Phone')}} :</strong>
                            <span class="ml-2">{{$client->phone}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Address')}} :</strong>
                            <span class="ml-2">{{$client->address}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('National ID')}} :</strong>
                            <span class="ml-2">{{$client->national_id}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Passport ID')}} :</strong>
                            <span class="ml-2">{{$client->passport_id}}</span>
                        </p>

                    </div>
                </div> <!-- end card-box -->


            </div> <!-- end col-->

            <div class="col-8">
                <div class="card-box widget-inline">
                    <div class="row">
                        <div class="col-sm-6 col-xl-6">
                            <div class="p-2 text-center">
                                <i class="mdi mdi-account-group text-danger mdi-24px"></i>
                                <h3><span data-plugin="counterup">{{$client->cases->count()}}</span></h3>
                                <p class="text-muted font-15 mb-0">{{__('#Cases')}}</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-6">
                            <div class="p-2 text-center">
                                <i class="mdi mdi-currency-usd text-success mdi-24px"></i>
                                <h3>$ <span data-plugin="counterup">{{$client->cases->sum('total_paid')}}</span></h3>
                                <p class="text-muted font-15 mb-0">{{__('paid')}}</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-6">
                            <div class="p-2 text-center">
                                <i class="mdi mdi-currency-usd text-success mdi-24px"></i>
                                <h3>$ <span data-plugin="counterup">{{$client->cases->sum('total_pending')}}</span></h3>
                                <p class="text-muted font-15 mb-0">{{__('Pending')}}</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-6">
                            <div class="p-2 text-center">
                                <i class="mdi mdi-currency-usd text-success mdi-24px"></i>
                                <h3>$ <span data-plugin="counterup">{{$client->cases->sum('total_expenses')}}</span></h3>
                                <p class="text-muted font-15 mb-0">{{__('Expenses')}}</p>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div> <!-- end card-box-->
            </div> <!-- end col-->
        </div>


        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div>

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
                                        <th>{{__('Court')}}</th>
                                        <th>{{__('Total Amount')}}</th>
                                        <th>{{__('Paid')}}</th>
                                        <th>{{__('Pending')}}</th>
                                        <th>{{__('Expenses')}}</th>
                                        <th>{{__('Commission')}}</th>
                                        <th>{{__('actions')}}</th>
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

                                @if($client->cases->count()==0)
                                    <h5 class="text-center">{{__('There is no data in this table!')}}</h5>
                                @endif
                            </div>

                            {{$cases->links()}}

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('.cases.partial.crudeModal')

@endsection
@section('script')
    @include('.cases.partial.scripts')
@endsection
