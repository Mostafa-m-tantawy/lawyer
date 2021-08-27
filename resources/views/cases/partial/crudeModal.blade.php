<div class="modal fade updateModel" id="updateModel" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">

                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Update Case')}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="type" value="service">
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
                                <label>{{__('Court')}}</label>
                                <select name="court_id" class="form-control">
                                    <option value=""> {{__('Select')}}</option>
                                    @foreach($courts as $court)
                                        <option value="{{$court->id}}"> {{$court->name}}</option>
                                    @endforeach
                                </select></div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Total Amount')}}</label>
                                <input type="number"  class="form-control" required name="total_amount">
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
            <form action="{{route('cases.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{__('New Case')}} <span
                            class="model_type"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" name="type" value="service">
                <div class="modal-body">
                    <input type="hidden" class="form-control" value="{{$client->id}}" required name="client_id">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Name')}}</label>
                                <input type="text" class="form-control" required name="name">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Court')}}</label>
                                <select name="court_id" class="form-control">
                                    <option value=""> {{__('Select')}}</option>
                                    @foreach($courts as $court)
                                        <option value="{{$court->id}}"> {{$court->name}}</option>
                                    @endforeach
                                </select></div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label>{{__('Total Amount')}}</label>
                                <input type="number"  class="form-control" required name="total_amount">
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
