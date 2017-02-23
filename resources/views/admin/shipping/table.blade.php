@extends('layout.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Checkout
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
              <h3 class="box-title">Table Contact</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Code_shipping</th>
                  <th>Email</th>
                   <th>Name</th>
                    <th>Address</th>
                    <th>Telphone</th>
                    <th>Status</th>
                  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as $key => $data)
                <tr>
                  <td>{{$data->code_shipping}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->address}}</td>
                  <td>{{$data->telp}}</td>
                  <td>{{$data->status}}</td>
                  <td>
                      </td>
                  <td><?php echo $data->content ?>
                  <!-- <td><a href="{{url('lihat'.$data->id)}}" type="button" class="btn btn-block btn-primary">Lihat</a></td> -->
                  <a href="{{url('/shipping/delete/'.$data->id)}}" onclick="return confirm('Delete?')" class="btn btn-danger">Delete</a>
                  <a href="{{url('/shipping/accept/'.$data->id)}}" onclick="return confirm('Accept?')" class="btn btn-primary">Accept</a>
                  <a href="{{url('/shipping/reject/'.$data->id)}}" onclick="return confirm('Reject?')" class="btn btn-danger">Reject</a>
                  <form action="{{url('/sendemail/'.$data->code_shipping)}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="email" value="{{$data->email}}">
                  <input type="hidden" name="code_shipping" value="{{$data->code_shipping}}">

                  <button type="submit" class="btn btn-danger">Send Email</button>
                  </form>
                  </td>
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