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
                            <div class="col-md-4">
                                <div id="edit_exam_name"><input id="input_exam_name" class="form-control" type="text" value="" style="float: left; width: 50%; margin-right: 10px"></div>
                                <div class="btn btn-primary">Search mall</div>
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
                                    <th style="width: 15%">Mall Name</th>
                                    <th style="width: 15%">Url</th>
                                    <th style="width: 10%">Phone</th>
                                    <th style="width: 10%">LostFound Email</th>
                                    <th style="width: 10%">Address</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                                @foreach($malls as $mall)
                                    <tr>
                                        <td>{{ $mall->id }}</td>
                                        <td>{{ $mall->name }}</td>
                                        <td>{{ $mall->web_url }}</td>
                                        <td>{{ $mall->phone }}</td>
                                        <td>{{ $mall->lostfound_email }}</td>
                                        <td>{{ $mall->address }}</td>
                                        <td>
                                            <a href="{{ route('show.update.mall', $mall->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <form action="#" style="display: inline" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $mall->id }}" name="mall_id">
                                                <a href="{{ route('delete.mall', $mall->id) }}" onclick="return confirm('Are you sure delete the mall?')"
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
                    {{ $malls->links() }}
                </div>
                <div class="col-md-6">
                    <div class="box box-default">
                        <form action="{{ route('add.mall') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title" id="mallModalLabel">Add Mall</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="mallName">Mall Name</label>
                                        <input type="text" class="form-control" id="mall-name" name="mall_name"
                                               placeholder="Enter mall name" required value="{{ old('mall_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Url</label>
                                        <input type="text" class="form-control" id="web_url" name="web_url"
                                               placeholder="Web url" value="{{ old('web_url') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone"
                                               placeholder="Phone" value="{{ old('phone') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               placeholder="Address" value="{{ old('address') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" id="logo" name="logo" value="{{ old('logo') }}"><br>
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
                                <button type="submit" class="btn btn-success">Add Mall</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection
