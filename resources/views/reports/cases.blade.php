@extends('layouts.vertical', ['title' => __('Cases Report')])
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
                                    href="javascript: void(0);"> {{__('Reports')}}</a></li>
                            <li class="breadcrumb-item active">{{__('Cases')}}</li>
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

                            <form method="get" action="{{route('reports.cases')}}">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>{{__('Client Name')}}</label>
                                            <select name="client_id" class="form-control">
                                                <option value=""> {{__('select')}}</option>
                                                @foreach($clients as $client)
                                                <option @if(request()->get('client_id')==$client->id ) selected @endif value="{{$client->id}}"> {{$client->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>{{__('Court')}}</label>
                                            <select name="court_id" class="form-control">
                                                <option value=""> {{__('select')}}</option>
                                                @foreach($courts as $court)
                                                <option  @if(request()->get('court_id')==$court->id ) selected @endif value="{{$court->id}}"> {{$court->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-3">
                                        <div class="form-group">
                                            <label>{{__('Start Created Date')}}</label>
                                            <input name="start_date" type="date" class="form-control" value="{{request()->get('start_date')}}">
                                        </div>
                                    </div>
                                <div class="col-3">
                                        <div class="form-group">
                                            <label>{{__('End Created Date')}}</label>
                                            <input name="end_date" type="date" class="form-control" value="{{request()->get('end_date')}}">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-12 text-right">
                                     <button class="btn btn-primary" type="submit">{{__('Submit')}}</button>

                                </div>
                                </div>

                            </form>
                        <!--begin: Datatable -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead class="thead-light">
                                    <tr>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('Client Name')}}</th>
                                        <th>{{__('Court Name')}}</th>
                                        <th>{{__('Created Date')}}</th>
                                        <th>{{__('Total Amount')}}</th>
                                        <th>{{__('Paid')}}</th>
                                        <th>{{__('Pending')}}</th>
                                        <th>{{__('Expenses')}}</th>
                                        <th>{{__('Commission')}}</th>
                                        <th>{{__('Note')}}</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        {{----}}
                                        <tr>

                                            <td>{{$item->id}}</td>
                                            <td>{{$item->client?$item->client->name:'' }}</td>
                                            <td>{{$item->court?$item->court->name:'' }}</td>
                                            <td>{{$item->created_at->format('Y-m-d')}}</td>
                                            <td>{{$item->total_amount}}</td>
                                            <td>{{$item->total_paid}}</td>
                                            <td>{{$item->total_pending}}</td>
                                            <td>{{$item->total_expenses}}</td>
                                            <td>{{$item->total_commissions}}</td>
                                            <td>{{$item->note}}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                                @if($data->count()==0)
                                    <h5 class="text-center">{{__('There is no data in this table!')}}</h5>
                                @endif
                            </div>

                                {{$data->appends(['report' => $data->currentPage()])->links()}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
@endsection
