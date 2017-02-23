@extends('layout.user')

@section('content')
<div class="container">
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/checkout') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
	<div class="check">	 
			 <h1>My Shopping Bag (2)</h1>
		 <div class="col-md-9 cart-items">
			
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			   @if(count($cart)==0)
               @elseif(count($cart))            
                        <?php
                            $grandsubtotal=0;
                        ?>
              	@foreach($cart as $key => $cart2)
				 <div class="cart-header">
					 <a href="{{url('/hapuscart/'.$key)}}"><i class="fa fa-trash-o"></i><div class="close1"></div></a>
					 <div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								 <img src="{{ url('image/'.$cart[$key]['image']) }}" class="img-responsive" alt=""/>
							</div>
						   <div class="cart-item-info">
							<h3><a href="#">{{ $cart[$key]['name'] }}</a></h3>
							<ul class="qty">

								<li><p>Price : {{$cart[$key]['price'] }}</p></li>
								<li><p>Qty : {{$cart[$key]['quantity']}} </p></li>

							</ul>
							
								 
						   </div>
						   <div class="clearfix"></div>
												
					  </div>
				 </div>
				<?php
				$tes = $cart[$key]['price']++;
				 ?>
				 
			 <script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
							$('.cart-header2').fadeOut('slow', function(c){
						$('.cart-header2').remove();
					});
					});	  
					});
			 </script>	
		 </div>
		  <div class="col-md-3 cart-total">
			
			 <div class="price-details">
			 	<h1>{{$tes}}</h1>
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1">{{$tes}}</span>
				 
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span>{{$tes}}</span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 @endforeach
			@endif
			
			 
			 <div class="clearfix"></div>
			 <a href="{{url('order/shipping')}}">Place Order</a>
			 <div class="total-item">
				 
			 </div>
			</div>
		
			<div class="clearfix"> </div>
	 </div>
	 </div>
	 @endsection
