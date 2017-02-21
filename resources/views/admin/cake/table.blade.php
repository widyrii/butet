@extends('layout.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Table Cake</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Desc</th>
                  <th>Price</th>
                  <th>Action</th>

                  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $cake)
                <tr>
                  <td>{{$cake->code}}</td>
                  <td>{{$cake->name}}</td>
                  <td><img src="{{ url('image/'.$cake->image) }}" alt="" style="max-width:100%;height: 40px;"></td>
                  <td>{{$cake->desc}}</td>
                  <td>{{$cake->price}}</td>
                  <td><a href="{{url('/cake/edit/'.$cake->id)}}" class="btn btn-primary">Edit</a></td>
                  <td><a href="{{url('/cake/delete/'.$cake->id)}}" onclick="return confirm('delete?')" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->


        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection