@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mall Function Manager
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Manager</a></li>
                <li class="active">Mall Function</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="col-md-4">
                                <div id="edit_exam_name"><input id="input_exam_name" class="form-control" type="text" value="" style="float: left; width: 50%; margin-right: 10px"></div>
                                <div class="btn btn-primary">Search</div>
                            </div>
                        </div>
                        <div style="width: 60%; padding-left: 10px">
                            @if (session('delete_status'))
                                <ul>
                                    <li class="text-blue"> {{ session('delete_status') }}</li>
                                </ul>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th style="width: 10%">ID</th>
                                    <th style="width: 25%">Mall Function Name</th>
                                    <th style="width: 10%">Key</th>
                                    <th style="width: 10%">Created At</th>
                                    <th style="width: 10%">Updated At</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                                @foreach($malls_functions as $mall_function)
                                    <tr>
                                        <td>{{ $mall_function->id }}</td>
                                        <td>{{ $mall_function->name }}</td>
                                        <td>{{ $mall_function->key }}</td>
                                        <td>{{ $mall_function->created_at }}</td>
                                        <td>{{ $mall_function->updated_at }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form action="#" style="display: inline" method="post">
                                                @csrf
                                                <input type="hidden" value="#" name="mall_function_id">
                                                <a href="#" onclick="return confirm('Are you sure delete the mall function?')"
                                                   class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div style="padding-left: 15px">
                    {{ $malls_functions->links() }}
                </div>
                <div class="col-md-6">
                    <div class="box box-default">
                        <form action="{{ route('add.mall') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title" id="mallModalLabel">Add Mall Function</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="mallName">Mall Function Name</label>
                                        <input type="text" class="form-control" id="mall-name" name="mall_name" placeholder="Enter mall function name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Key</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Key" >
                                    </div>
                                </div>
                                @if (count($errors) >0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if (session('status'))
                                    <ul>
                                        <li class="text-blue"> {{ session('status') }}</li>
                                    </ul>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Clear</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection
