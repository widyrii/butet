@extends('layout.user')

@section('content')
<div class="contact">
			
			<div class="container">
				<h1>Contact</h1>
			<div class="contact-form">
				
				<div class="col-md-8 contact-grid">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/contact/save') }}" enctype="multipart/form-data">
              {{ csrf_field() }}	
						<input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}" name="name">
					
						<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}" name="email">
						<input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}" name="sub">
						
						<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}" name="mess">Message</textarea>
						<div class="send">
							<input type="submit" value="Send">
						</div>
					</form>
				</div>
				<div class="col-md-4 contact-in">

						<div class="address-more">
						<h4>Address</h4>
							<p>Jl.Tanjung lengkong,</p>
							<p>Tel:08723273823</p>
							<p>Email:<a href="widya985@gmail.com"> widya985@gmail.com</a></p>
						</div>
						
							
						</div>
					
				</div>
				<div class="clearfix"> </div>
			</div>
			
		</div>
		
	</div>
@endsection