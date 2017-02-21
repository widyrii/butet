@extends('layout.user')

@section('content')


    <div class="banner">
        <div class="container">
              <script src="js/responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
            <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider">
                <li>
                    
                        <div class="banner-text">
                            <h3> ButetS Bakery </h3>
                            <p>serves varied products of bread, the traditional cake of these products and services through the internet continues to grow in ButetS Bakery Bakery in community service</p>
                        
                        </div>
                
                </li>
                <li>
                    
                        
                    
                </li>
                <li>
                        
                </li>
            </ul>
        </div>

    </div>
    </div>

<div class="content">
    <div class="container">
    <div class="content-top">
        <h1>NEW RELEASED</h1>
        <div class="grid-in">
            @foreach($cake as $key => $cake)
            <div class="col-md-4 grid-top">
                <a href="{{ url('/cakes/'.$cake->slug) }}" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="{{ url('image/'.$cake->image) }}" alt="" style="width: 100%;height: 300px;">
                            <div class="b-wrapper">
                                    <h3 class="b-animate b-from-left    b-delay03 ">
                                        <span>{{$cake->code_cake}}</span>    
                                    </h3>
                                </div>
                </a>
        

            <p><a href="single.html">{{$cake->name}}</a></p>
            </div>
            @endforeach
            
            <div class="clearfix"> </div>
        </div>
        
    </div>
    </div>
</div>

@endsection
