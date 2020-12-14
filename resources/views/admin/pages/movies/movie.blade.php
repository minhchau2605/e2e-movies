@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="app">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Movie Manager
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Manager</a></li>
                <li class="active">Movie</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <list-movie></list-movie>
        </section>
        <!-- /.content -->
    </div>
@endsection
