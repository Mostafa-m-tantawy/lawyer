@extends('layouts.vertical', ['title' => __('Case')])
@section('styles')
@endsection

@section('content')
    <!-- end row -->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">


                    <div class="page-title">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('admin')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="javascript: void(0);"> {{__('Case')}}</a></li>
                            <li class="breadcrumb-item active">{{__('Show')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card-box text-center">
                    <h4 class="mb-0">{{$case->name}}</h4>

                    <div class="text-left mt-3">
                        <h4 class="font-13 text-uppercase">{{__('About Me')}} :</h4>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Name')}} :</strong>
                            <span class="ml-2">{{$case->name}}</span>
                        </p>


                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Court')}} :</strong>
                            <span class="ml-2">{{$case->court?$case->court->name:''}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Total Amount')}} :</strong>
                            <span class="ml-2">{{$case->total_amount}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Paid')}} :</strong>
                            <span class="ml-2">{{$case->total_paid}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Pending')}} :</strong>
                            <span class="ml-2">{{$case->total_pending}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Expenses')}} :</strong>
                            <span class="ml-2">{{$case->total_expenses}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong> {{__('Commission')}} :</strong>
                            <span class="ml-2">{{$case->total_commissions}}</span>
                        </p>

                    </div>
                </div> <!-- end card-box -->


            </div> <!-- end col-->

            <div class="col-8">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="">{{__('Case Payments')}}</h5>

                            </div>
                            <div class="col-6 align-content-end">
                                <h5 class="text-right"><a href="#" data-toggle="modal" data-target="#newModel"
                                                          data-pending="{{$case->total_pending}}"
                                                          data-type="Payment" data-title="{{__('New Payment')}}"
                                                          class="btn btn-primary btn-rounded waves-effect waves-light mb-3"><i
                                            class="mdi mdi-plus"></i> {{__('new record')}}</a></h5>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div>


                            <!--begin: Datatable -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead class="thead-light">
                                    <tr>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Payment Method')}}</th>
                                        <th>{{__('Payment Date')}}</th>
                                        <th>{{__('Note')}}</th>
                                        <th style="width: 250px;">{{__('actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)
                                        <tr>

                                            <td>{{$payment->id}}</td>
                                            <td>{{$payment->amount}}</td>
                                            <td>{{$payment->payment_method}}</td>
                                            <td>{{$payment->payment_date}}</td>
                                            <td>{{$payment->note}}</td>
                                            <td>

                                                <a title="update" class="btn btn-info"
                                                   data-toggle="modal" data-target=".updateModel"
                                                   data-data="{{$payment}}"
                                                   data-title="{{__('Update Payment')}}"
                                                   data-pending="{{$case->total_pending}}"
                                                   data-url="{{route('case.payments.update',[$payment->id])}}">
                                                    {{__('Edit')}}
                                                </a>
                                                <form style="display: inline" method="post"
                                                      action="{{route('case.payments.destroy',[$payment->id])}}">
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


                        </div>

                    </div>
                </div>

            </div> <!-- end col-->
        </div>


        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="">{{__('Case Expenses')}}</h5>

                        </div>
                        <div class="col-6 align-content-end">
                            <h5 class="text-right"><a href="#" data-toggle="modal" data-target="#newModel"
                                                      data-pending=""

                                                      data-type="Expenses" data-title="{{__('New Expenses')}}"
                                                      class="btn btn-primary btn-rounded waves-effect waves-light mb-3"><i
                                        class="mdi mdi-plus"></i> {{__('new record')}}</a></h5>
                        </div>
                    </div>


                    <div class="card-body">
                        <div>


                            <!--begin: Datatable -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead class="thead-light">
                                    <tr>
                                        <th>{{__('ID')}}</th>

                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Payment Method')}}</th>
                                        <th>{{__('Payment Date')}}</th>
                                        <th>{{__('Note')}}</th>
                                        <th style="width: 250px;">{{__('actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($expenses as $payment)
                                        <tr>

                                            <td>{{$payment->id}}</td>
                                            <td>{{$payment->amount}}</td>
                                            <td>{{$payment->payment_method}}</td>
                                            <td>{{$payment->payment_date}}</td>
                                            <td>{{$payment->note}}</td>
                                            <td>

                                                <a title="update" class="btn btn-info"
                                                   data-toggle="modal" data-target=".updateModel"
                                                   data-data="{{$payment}}"
                                                   data-pending=""
                                                   data-title="{{__('Update Expenses')}}"
                                                   data-url="{{route('case.payments.update',[$payment->id])}}">
                                                    {{__('Edit')}}
                                                </a>
                                                <form style="display: inline" method="post"
                                                      action="{{route('case.payments.destroy',[$payment->id])}}">
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


                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="card">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="">{{__('Case Commissions')}}</h5>

                        </div>
                        <div class="col-6 align-content-end">
                            <h5 class="text-right"><a href="#" data-toggle="modal" data-target="#newModel"
                                                      data-pending=""
                                                      data-type="Commission" data-title="{{__('New Commission')}}"
                                                      class="btn btn-primary btn-rounded waves-effect waves-light mb-3"><i
                                        class="mdi mdi-plus"></i> {{__('new record')}}</a></h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>


                            <!--begin: Datatable -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead class="thead-light">
                                    <tr>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('Percentage')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Payment Method')}}</th>
                                        <th>{{__('Payment Date')}}</th>
                                        <th>{{__('Note')}}</th>
                                        <th style="width: 250px;">{{__('actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($commissions as $payment)
                                        <tr>

                                            <td>{{$payment->id}}</td>
                                            <td>{{$payment->percentage}}%</td>
                                            <td>{{$payment->amount}}</td>
                                            <td>{{$payment->payment_method}}</td>
                                            <td>{{$payment->payment_date}}</td>
                                            <td>{{$payment->note}}</td>
                                            <td>

                                                <a title="update" class="btn btn-info"
                                                   data-toggle="modal" data-target=".updateModel"
                                                   data-data="{{$payment}}"
                                                   data-pending=""
                                                   data-title="{{__('Update Commissions')}}"
                                                   data-url="{{route('case.payments.update',[$payment->id])}}">
                                                    {{__('Edit')}}
                                                </a>
                                                <form style="display: inline" method="post"
                                                      action="{{route('case.payments.destroy',[$payment->id])}}">
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


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('.casePayments.partial.crudeModal')

@endsection
@section('script')
    @include('.casePayments.partial.scripts')
@endsection
