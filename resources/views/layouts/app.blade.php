<!DOCTYPE html>
<html lang="en">
<head>
<title>Butet'S</title>
<link href="{{url('user/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{url('user/js/jquery.min.js')}}"></script>
<!--theme-style-->
<link href="{{url('user/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />  
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href="{{url('http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900')}}" rel='stylesheet' type='text/css'>
<link href={{url('http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900')}} rel='stylesheet' type='text/css'><!--//fonts-->
<!-- start menu -->
<link href="{{url('user/css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{url('user/js/memenu.js')}}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="{{url('user/js/simpleCart.min.js')}}"> </script>
</head>
<body>
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="search">
                    <form>
                        <input type="text" value="Search " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                        <input type="submit" value="Go">
                    </form>
            </div>
            <div class="header-left">       
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{url('register')}}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <div class="cart box_1">
                        <a href="checkout.html">
                        <h3> <div class="total">
                            <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
                            <img src="images/cart.png" alt=""/></h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

                    </div>
                    
            </div>
                
        </div>
        </div>

       <div class="container">
            <div class="head-top">
                <div class="logo">
                    <a href="index.html"><img src="{{url('user/images/logo.png')}}" alt=""></a> 
                </div>
          <div class=" h_menu4">
                <ul class="memenu skyblue">
                      <li class="active grid"><a class="color8" href="{{url ('\welcome')}}">Home</a></li>   
                      <li><a class="color1" href="#">Products</a>
                        <div class="mepanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <ul>
                                    @php
                                        $master_cakes = \App\master_cake::with('class')->get();
                                    @endphp
                                    @foreach($master_cakes as $key => $master_cake)
                                        <li><a href="{{url('/category/'.$master_cake->name)}}">{{$master_cake->name}}</a></li>
                                    @endforeach
                                    
                                    </ul>   
                                </div>                          
                            </div>
                          </div>
                        </div>
                    </li>
                <li><a class="color4" href="blog.html">Blog</a></li>                
                <li><a class="color6" href="{{url('/contact')}}">Contact</a></li>
              </ul> 
            </div>
                
                <div class="clearfix"> </div>
        </div>
        </div>

            </div>
        </nav>


        @yield('content')
<div class="footer">
                <div class="container">
            <div class="footer-top-at">
            
                <div class="col-md-4 amet-sed">
                <h4>MORE INFO</h4>
                <ul class="nav-bottom">
                        <li><a href="#">How to order</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="contact.html">Location</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Membership</a></li> 
                    </ul>   
                </div>
                <div class="col-md-4 amet-sed ">
                <h4>CONTACT US</h4>
                
                    <p>
Contrary to popular belief</p>
                    <p>The standard chunk</p>
                    <p>office:  +12 34 995 0792</p>
                    <ul class="social">
                        <li><a href="#"><i> </i></a></li>                       
                        <li><a href="#"><i class="twitter"> </i></a></li>
                        <li><a href="#"><i class="rss"> </i></a></li>
                        <li><a href="#"><i class="gmail"> </i></a></li>
                        
                    </ul>
                </div>
                <div class="col-md-4 amet-sed">
                    <h4>Newsletter</h4>
                    <p>Sign Up to get all news update
and promo</p>
                    <form>
                        <input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                        <input type="submit" value="Sign up">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer-class">
        <p >© 2015 New store All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
        </div>
        </div>

</body>
</html>
