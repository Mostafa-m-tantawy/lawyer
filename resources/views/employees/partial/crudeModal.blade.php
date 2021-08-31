<div class="modal fade updateModel" id="updateModel" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">

                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Update Employee')}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Name')}}</label>
                                <input type="text" class="form-control" required name="name">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Email')}}</label>
                                <input type="email" class="form-control" required name="email">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Phone')}}</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Address')}}</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('National Id')}}</label>
                                <input type="text" class="form-control" name="national_id">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Passport ID')}}</label>
                                <input type="text" class="form-control" name="passport_id">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Profession')}}</label>
                                <input type="text" class="form-control" name="profession">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Profession ID')}}</label>
                                <input type="text" class="form-control" name="profession_id">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Starting Date')}}</label>
                                <input type="date" class="form-control" name="starting_date">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Salary')}}</label>
                                <input type="number" step="0.01" class="form-control" name="salary">
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
            <form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{__('New Employee')}} <span
                            class="model_type"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Name')}}</label>
                                <input type="text" class="form-control" required name="name">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Email')}}</label>
                                <input type="email" class="form-control" required name="email">
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Phone')}}</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Address')}}</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('National Id')}}</label>
                                <input type="text" class="form-control" name="national_id">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Passport ID')}}</label>
                                <input type="text" class="form-control" name="passport_id">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Profession')}}</label>
                                <input type="text" class="form-control" name="profession">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Profession ID')}}</label>
                                <input type="text" class="form-control" name="profession_id">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Starting Date')}}</label>
                                <input type="date" class="form-control" name="starting_date">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Salary')}}</label>
                                <input type="number" step="0.01" class="form-control" name="salary">
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
