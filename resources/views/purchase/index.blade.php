@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Purchase Modules
            {{-- <small>Subheading</small> --}}
        </h1>
        
        @include('inc.message')

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Hire Purchase Modules</li>
        </ol>

        <div class="row">
            <div class="col-12 mb-4">
                <button class="btn btn-primary" data-target="#hire-modal" data-toggle="modal">
                        Add Hire Purchase
                </button>
                <div class="modal" id="hire-modal" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(['action' => 'HiresController@store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                            
                                <div class="modal-header">
                                        <h3 class="modal-title">Add Hire Purchase Criteria</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"> &times; </span>
                                    </button>
                                </div>
                
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name" class=" control-label">Hire Purchase Name</label>
                                        <div class="">
                                            <input type="text" id="name" name="hire_purchase_name" class="form-control" autofocus required>
                                            <span class="help-block with-errors"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label">Hire Purchase (%) on Amount</label>
                                        <div class="c">
                                            <input type="text" id="name" name="hire_purchase_percentage" class="form-control" autofocus required>
                                            <span class="help-block with-errors"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label">Hire Purchase Duration</label>
                                        <div class="">
                                            <input type="text" id="name" name="hire_purchase_payment_duration" class="form-control" autofocus required>
                                            <span class="help-block with-errors"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label">Hire Purchase (%) on Principle</label>
                                        <div class="">
                                            <input type="text" id="name" name="hire_purchase_percentage_principle" class="form-control" autofocus required>
                                            <span class="help-block with-errors"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label">Hire Purchase Minimum Price</label>
                                        <div class="">
                                            <input type="text" id="name" name="hire_purchase_min_price" class="form-control" autofocus required>
                                            <span class="help-block with-errors"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label">Hire Purchase Maximum Price</label>
                                        <div class="">
                                            <input type="text" id="name" name="hire_purchase_max_price" class="form-control" autofocus required>
                                            <span class="help-block with-errors"></span>
                                        </div>
                                    </div>           
                                </div>
                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">Card Title</h4>
                    <div class="card-body">
                        <table id="contact-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="30">No</th>
                                    <th>Name</th>
                                    <th>Profit %</th>
                                    <th>Duration</th>
                                    <th>Principle %</th>
                                    <th>Min Price</th>
                                    <th>Max Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hirepurchases as $hirepurchase)
                                <tr>
                                    <td>{{$hirepurchase->id}}</td>
                                    <td>{{$hirepurchase->hire_purchase_name}}</td>
                                    <td>{{$hirepurchase->hire_purchase_percentage}} %</td>
                                    <td>{{$hirepurchase->hire_purchase_payment_duration}} Months</td>
                                    <td>{{$hirepurchase->hire_purchase_percentage_principle}} %</td>
                                    <td>{{$hirepurchase->hire_purchase_min_price}}</td>
                                    <td>{{$hirepurchase->hire_purchase_max_price}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('hire.edit',$hirepurchase->id)}}"><i class="fa fa-pencil"></i>Edit</a>
                                        <a class="btn btn-danger" href="{{url('hire')}}"><i class="fa fa-trash"></i>Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.container -->
@endsection
