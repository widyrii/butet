@extends('layout.user')

@section('content')
<div class="contact">			
	<div class="container">
		<h1>Contact</h1>
	<div class="contact-form">
		<div class="col-md-12 contact-grid">	
			<input type="text" id="inputCode" placeholder="Kode Shipping" name="code_shipping">
			<a id="buttonCheck" class="btn btn-primary">Search</a>
		</div>
		 <div class="row none" style="margin: auto;" id="infoCake">
            <table class="table">
                <tr>
                    <td>Shipping Code</td>
                    <td id="shippingCode"></td>
                </tr>
                <tr>
                    <td>Cake Name</td>
                    <td id="cakeName"></td>
                </tr>
                <tr>
                    <td>Cake Code</td>
                    <td id="cakeCode"></td>
                </tr>
                <tr>
                    <td>Cake Price</td>
                    <td id="price"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td id="email"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td id="name"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td id="address"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td id="phone"></td>
                </tr>
                <tr>
                    <td>Gambar Pemesanan</td>
                    <td><img src="" id="gambar"></td>
                </tr>
            </table>
        </div>
	</div>
</div>
</div>
<script type="text/javascript">
	$(function() {
		$("#buttonCheck").on('click', function() {
			var check = $("#inputCode").val();
			if (check.length > 0) {
				$.ajax({
					url: '{{ url('cek_order/api') }}/'+check,
					method: 'GET',
					success: function(data) {
						$("#shippingCode").html(data.shipping.code_shipping);
						$("#email").html(data.shipping.email);
						$("#name").html(data.shipping.name);
						$("#phone").html(data.shipping.telp);
						$("#cakeName").html(data.cake.name);
						$("#cakeCode").html(data.cake.code);
						$("#price").html(data.cake.price);
						$('#gambar').attr('src', '{{ url('images') }}/'+data.cake.image);
					}
				})
			}
		});
	});
</script>
@endsection