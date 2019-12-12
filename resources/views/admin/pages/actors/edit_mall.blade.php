@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mall Manager
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Manager</a></li>
                <li class="active">Mall</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Edit manager</h3>
                            <div style="float: right; padding-right: 30px">
                                {{--<a href="" class="btn btn-success">Add exam</a>--}}
                            </div>
                        </div>
                        <div class="box-header">
                            <h3 style="font-size: 100%" class="box-title">Detail mall</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <div class="container">
                                <div class="col-md-8">
                                    <form method="POST" action="{{ route('update.mall') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $mall->id }}" name="mall_id">
                                        <div class="form-group">
                                            <label for="mallName">Mall Name</label>
                                            <input type="text" class="form-control" id="mall-name" name="mall_name" placeholder="Enter mall name" value="{{ $mall->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="url">Url</label>
                                            <input type="text" class="form-control" id="web_url" name="web_url" placeholder="Web url" value="{{ $mall->web_url }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $mall->address }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ $mall->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Lost found email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $mall->lostfound_email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" id="logo" name="logo"><br>
                                            <img src="{{ asset($mall->logo) }}" alt="">
                                        </div>
                                        <div>
                                            <input type="submit" class="btn btn-primary" value="Update mall">
                                            @if (count($errors) >0)
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li class="text-danger" style="margin-left: -25px;padding-top: 15px;">
                                                            {{ $error }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            @if (session('status'))
                                                <ul>
                                                    <li class="text-blue" style="margin-left: -25px;padding-top: 15px;">
                                                        {{ session('status') }}
                                                    </li>
                                                </ul>
                                            @endif
                                        </div>
                                    </form>
                                    <table class="table table-hover fixed_headers" id="list-function-of-mall">
                                        <h3 style="font-size: 100%;">List function</h3>
                                        <tr>
                                            <th style="width: 10%">ID</th>
                                            <th style="width: 35%">Name</th>
                                            <th style="width: 20%">Key</th>
                                            <th style="width: 15%; text-align: center">Status Function</th>
                                        </tr>
                                        @foreach($malls_functions_of_mall as $mall_function)
                                            <tr>
                                                <td>{{ $mall_function->id }}</td>
                                                <td>{{ $mall_function->name }}</td>
                                                <td>{{ $mall_function->key }}</td>
                                                <td style="text-align: center">
                                                    {{--<input name="chooseQuestion[]" value="{{$mall_function->id}}" type="checkbox">--}}
                                                    <input type="hidden" name="arrayId[]" value="{{ $mall_function->id }}">
                                                    @if($mall_function->status == 1)
                                                        <input type="button" class="btn btn-info" value="On" id="function-{{ $mall_function->id }}"
                                                               onclick="settingMallFunction({{ $mall_function->id }}, {{ $mall->id }});">
                                                    @else
                                                        <input type="button" class="btn btn-danger" value="Off" id="function-{{ $mall_function->id }}"
                                                               onclick="settingMallFunction({{ $mall_function->id }}, {{ $mall->id }});">
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                    <!-- /.box -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
