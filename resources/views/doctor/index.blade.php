@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Navbar</li>
        </ol>
        <h1>Navbar</h1>
        <hr>
        <p>The SB Admin navbar can be either fixed or static, and it supports the navbar-light and navbar-dark Bootstrap 4 classes.</p>
        <a class="btn btn-primary" href="#" id="toggleNavPosition">Toggle Fixed/Static Navbar</a>
        <a class="btn btn-primary" href="#" id="toggleNavColor">Toggle Navbar Color</a>
        <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
        <div style="height: 1000px;"></div>
    </div>
    <!-- /.container -->
@endsection
