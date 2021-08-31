@extends('layouts.vertical', ['title' => __('Employee payments')])
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
                                    href="javascript: void(0);"> {{__('Employee')}}</a></li>
                            <li class="breadcrumb-item active">{{__('index')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card-box text-center">
                    <h4 class="mb-0">{{$employee->name}}</h4>

                    <div class="text-left mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Name')}} :</strong>
                            <span class="ml-2">{{$employee->name}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Email')}} :</strong>
                            <span class="ml-2">{{$employee->email}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Phone')}} :</strong>
                            <span class="ml-2">{{$employee->phone}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Address')}} :</strong>
                            <span class="ml-2">{{$employee->address}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('National ID')}} :</strong>
                            <span class="ml-2">{{$employee->national_id}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Passport ID')}} :</strong>
                            <span class="ml-2">{{$employee->passport_id}}</span>
                        </p>

                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Profession')}} :</strong>
                            <span class="ml-2">{{$employee->profession}}</span>
                        </p>


                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Profession ID')}} :</strong>
                            <span class="ml-2">{{$employee->profession_id}}</span>
                        </p>


                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Starting Date')}} :</strong>
                            <span class="ml-2">{{$employee->passport_id}}</span>
                        </p>


                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Salary')}} :</strong>
                            <span class="ml-2">{{$employee->salary}}</span>
                        </p>

                    </div>
                </div> <!-- end card-box -->


            </div> <!-- end col-->

            <div class="col-8">
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
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Payment Method')}}</th>
                                        <th>{{__('Payment Date')}}</th>
                                        <th>{{__('Start Date')}}</th>
                                        <th>{{__('End Date')}}</th>
                                        <th>{{__('Note')}}</th>
                                        <th style="width: 180px;">{{__('actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($payments as $payment)
                                        <tr>

                                            <td>{{$payment->id}}</td>
                                            <td>{{$payment->amount}}</td>
                                            <td>{{$payment->payment_method}}</td>
                                            <td>{{$payment->payment_date}}</td>
                                            <td>{{$payment->start_date}}</td>
                                            <td>{{$payment->end_date}}</td>
                                            <td>{{$payment->note}}</td>

                                            <td>

                                                <a title="update" class="btn btn-info"
                                                   data-toggle="modal" data-target=".updateModel"
                                                   data-data="{{$payment}}"
                                                   data-url="{{route('employee.payments.update',[$payment->id])}}"
                                                >
                                                    {{__('Edit')}}
                                                </a>
                                                <form style="display: inline" method="post"
                                                      action="{{route('employee.payments.destroy',[$payment->id])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"> {{__('delete')}}</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                                @if($payments->count()==0)
                                    <h5 class="text-center">{{__('There is no data in this table!')}}</h5>
                                @endif
                            </div>

                            {{$payments->links()}}

                        </div>

                    </div>
                </div>
            </div> <!-- end col-->
        </div>



    </div>
    @include('.employeePayments.partial.crudeModal')

@endsection
@section('script')
    @include('.employeePayments.partial.scripts')
@endsection
