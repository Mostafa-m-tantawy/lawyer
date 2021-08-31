<div class="modal fade updateModel" id="updateModel" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">

                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title"> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Amount')}}</label>
                                <input type="number"  class="form-control" required name="amount">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Payment Method')}}</label>
                                <select   class="form-control"  name="payment_method">
                                    <option value=""> {{__('Select')}}</option>
                                    <option value="Check"> {{__('Check')}}</option>
                                    <option value="Cash"> {{__('Cash')}}</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Payment Date')}}</label>
                                <input type="date"  class="form-control"  name="payment_date">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Start Date')}}</label>
                                <input type="date"  class="form-control"  name="start_date">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('End Date')}}</label>
                                <input type="date"  class="form-control"  name="end_date">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Note')}}</label>
                                <textarea class="form-control"  name="note"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="col-12 pull-left">
                        <button type="submit" class="btn btn-primary">{{__('update')}}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade newModel" id="newModel" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog  ">
        <div class="modal-content">
            <form action="{{route('employee.payments.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><span
                            class="model_type"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden"  value="{{$employee->id}}" required name="employee_id">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Amount')}}</label>
                                <input type="number"  class="form-control" required name="amount">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Payment Method')}}</label>
                                <select   class="form-control"  name="payment_method">
                                    <option value=""> {{__('Select')}}</option>
                                    <option value="Check"> {{__('Check')}}</option>
                                    <option value="Cash"> {{__('Cash')}}</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Payment Date')}}</label>
                                <input type="date"  class="form-control"  name="payment_date">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Start Date')}}</label>
                                <input type="date"  class="form-control"  name="start_date">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('End Date')}}</label>
                                <input type="date"  class="form-control"  name="end_date">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Note')}}</label>
                                <textarea class="form-control"  name="note"></textarea>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <div class="col-12 pull-left">
                        <button type="submit" class="btn btn-primary">{{__('create')}}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
