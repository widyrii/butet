@extends('layout.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-daARboard"></i> Home</a></li>
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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Cake</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/cake/update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}   
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $data->id}}"> 

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Code</label>
                   <input type="text" class="form-control" name="code" required value="{{ $data->code }}" readonly>
                </div>
                <div class="form-group">
                      <select class="form-control show-tick" name="code_cake" value="{{ $data->code_cake }}" required>
                                        <option value="{{ $data->code }}">Select Category</option>
                                        @foreach($master_cakes as $key => $master_cake)
                                        <option value="{{ $master_cake->name }}">{{ $master_cake->name }}</option>
                                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Desc</label>
                  <input type="text" class="form-control" value="{{$data->desc}}" name="desc" required>
                </div>
                <div class="form-group">
                    <div style="max-width: 50%;height: 10%;"><img class="img-thumbnail" src="{{ url('image/'.$data->image) }}">
                    </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" class="form-control"  name="image" value="{{$data->image}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="number" class="form-control" value="{{$data->price}}" name="price" required>
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->


        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection