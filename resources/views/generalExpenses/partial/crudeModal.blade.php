<div class="modal fade updateModel" id="updateModel" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">

                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Update '.$breadcrumb)}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Name')}}</label>
                                <input  list="names"  type="text"  class="form-control" required name="name" autocomplete="off">
                                <datalist id="names">
                                    @foreach($options as $option)
                                    <option value="{{$option}}">
                                    @endforeach

                                </datalist>

                            </div>
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
            <form action="{{route('general-expenses.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{__('New '.$breadcrumb)}} <span
                            class="model_type"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <input type="hidden"   name="type">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Name')}}</label>
                                <input  list="storenames"  type="text"  class="form-control" required name="name" autocomplete="off">
                                <datalist id="storenames">
                                    @foreach($options as $option)
                                        <option value="{{$option}}">
                                    @endforeach
                                </datalist>
                            </div>
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
