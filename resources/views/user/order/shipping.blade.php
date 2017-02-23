@extends('layout.user')
@section('content')

<div class="contact">
			
			<div class="container">
				<h1>Checkout</h1>
			<div class="contact-form">
				
				<div class="col-md-8 contact-grid">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/shipping/save') }}" enctype="multipart/form-data">
              {{ csrf_field() }}	
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
              			

						<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}" name="email">
					
						<input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}" name="name">

						<input type="text" value="Addres" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Address';}" name="address">

						<input type="text" value="Telephone" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Telephone';}" name="telp">

            <input type="hidden" name="code_cake" value="Birthday">
						<input type="hidden" name="status" value="pending">

            <div class="available">
              <ul>
                <li>Cake
                  <select>
                  @foreach($cake as $key)
                  <option value="{{ $key->code }}">{{ $key->name }}</option>
                  @endforeach
                </select></li>
              </ul>
            </div>
						
						<div class="send">
							<input type="submit" value="Send">
						</div>
					</form>
				</div>
				
				</div>
				<div class="clearfix"> </div>
			</div>
			
		</div>
		
	</div>
@endsection