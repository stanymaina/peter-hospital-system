@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Orders
            {{-- <small>Subheading</small> --}}
        </h1>
        
        @include('inc.message')

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Orders</li>
        </ol>

        <div class="row">
            <div class="col-12 mb-4">
                <button onclick="load_add_product()" class="btn btn-primary" data-target="#show-modal" data-toggle="modal">
                        Add Order
                </button>
            </div>
            <div class="modal" id="show-modal" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div id="order-show">
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
                                    <th>Product Name</th>
                                    <th>Payment Plan</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->product->product_name}}</td>
                                    <td>{{$order->planId->hire_purchase_name}}</td>
                                    <td>{{$order->order_price}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>
                                        <a class="btn btn-primary" onclick="load_show_order({{$order->id}})" data-target="#show-modal" data-toggle="modal"><i class="fa fa-edit"></i>Edit</a>
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
