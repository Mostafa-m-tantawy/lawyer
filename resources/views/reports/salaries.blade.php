@extends('layouts.vertical', ['title' => __('Salaries Report')])
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
                            <li class="breadcrumb-item active">{{__('Salaries')}}</li>
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

                            <form method="get" action="{{route('reports.salaries')}}">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>{{__('Employee Name')}}</label>
                                            <select name="employee_id" class="form-control">
                                                <option value=""> {{__('select')}}</option>
                                                @foreach($employees as $employee)
                                                <option @if(request()->get('employee_id')==$employee->id ) selected @endif value="{{$employee->id}}"> {{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>{{__('Profession')}}</label>
                                            <select name="profession" class="form-control">
                                                <option value=""> {{__('select')}}</option>
                                                @foreach($professions as $profession)
                                                <option  @if(request()->get('profession')==$profession->profession ) selected @endif value="{{$profession->profession}}"> {{$profession->profession}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-3">
                                        <div class="form-group">
                                            <label>{{__('Start Payment Date')}}</label>
                                            <input name="start_date" type="date" class="form-control" value="{{request()->get('start_date')}}">
                                        </div>
                                    </div>
                                <div class="col-3">
                                        <div class="form-group">
                                            <label>{{__('End Payment Date')}}</label>
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
                                        <th>{{__('Employee Name')}}</th>
                                        <th>{{__('Payment Date')}}</th>
                                        <th>{{__('Start Date')}}</th>
                                        <th>{{__('End Date')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Note')}}</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        {{----}}
                                        <tr>

                                            <td>{{$item->id}}</td>
                                            <td>{{$item->employee?$item->employee->name:'' }}</td>
                                            <td>{{$item->payment_date}}</td>
                                            <td>{{$item->start_date}}</td>
                                            <td>{{$item->end_date}}</td>
                                            <td>{{$item->amount}}</td>
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
