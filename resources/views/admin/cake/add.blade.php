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
            <form role="form" method="post" action="{{url('/cake/save')}}" enctype="multipart/form-data">
            {{ csrf_field() }}   
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Code</label>
                                      <?php
                                            $a = rand(0,999);
                                            $b = rand(0,9);
                                            if ($a<100) {
                                              $code = "AR-".$b.substr($a,0,5);
                                              $randomkode = "AR-".$b.substr($a,0,5);
                                            }
                                            elseif ($a<100) {
                                              $code = "AR-".$b.$b.substr($a,0,4);
                                              $randomkode = "AR-".$b.$b.substr($a,0,4);
                                            }
                                            elseif ($a<10) {
                                              $code = "AR-".$b.$b.$b.substr($a,0,3);
                                              $randomkode = "AR-".$b.$b.$b.substr($a,0,3);
                                            }
                                            elseif ($a<10) {
                                              $code = "AR-".$b.$b.$b.$b.substr($a,0,2);
                                              $randomkode = "AR-".$b.$b.$b.$b.substr($a,0,2);
                                            }              
                                            else {
                                              $code = "AR".$a;
                                              $randomkode = "AR-".$a;
                                            }
                                        ?>
                   <input type="text" class="form-control" name="code" required value="{{ $randomkode}}" readonly>
                </div>
                <div class="form-group">
                      <select class="form-control show-tick" name="code_cake" required>
                                        <option value="">Select Category</option>
                                        @foreach($master_cakes as $key => $master_cake)
                                        <option value="{{ $master_cake->name }}">{{ $master_cake->name }}</option>
                                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Desc</label>
                  <input type="text" class="form-control" placeholder="Enter Desc" name="desc" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" class="form-control"  name="image" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="number" class="form-control" placeholder="Enter Price" name="price" required>
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