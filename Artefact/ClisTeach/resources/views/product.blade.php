@extends("layouts.clisteach")
@section("title")
    Product Page
@endsection
@section("body-attribs")
style="max-width:100vw"
@endsection
@section("content")
<div class="container">
    @include("components.navbar")
    <h1 class="display-3">Product Name <!--<a class="btn btn-success btn-lrg">Buy Now</a>--></h1>
    <div id="imgcarousel" class="carousel slide" data-ride="carousel" style="background-color:grey;text-align:center;padding:10%">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#imgcarousel" data-slide-to="0" class="active"></li>
            <li data-target="#imgcarousel" data-slide-to="1"></li>
            <li data-target="#imgcarousel" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="/images/smart-home-device.png" alt="Product {{$id}} image 1">
            </div>
            <div class="carousel-item">
            <img src="/images/plastic.jpg" alt="Product {{$id}} image 2">
            </div>
            <div class="carousel-item">
            <img src="/images/rock.jpg" alt="Product {{$id}} image 3">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#imgcarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#imgcarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
    <small>ID: {{$id}} </small>
    <hr>
    <div class="row">
        <div class="col md-4">
            <h3 class="display-3">
                Description
            </h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris gravida euismod lorem, eu suscipit purus rhoncus in. Donec aliquet commodo velit, sed commodo mi dignissim in. Ut luctus est lacinia urna aliquet, sit amet euismod odio interdum. Vestibulum quis dignissim purus, nec eleifend quam. Aliquam vitae purus non lectus condimentum lacinia. Fusce tincidunt felis eget velit consectetur, a euismod est aliquet. Integer ac nibh dictum, commodo lectus vel, lobortis leo. Nulla ac diam id leo molestie ultrices in vitae enim. In bibendum nunc neque, quis viverra diam porta sit amet. Integer quam justo, facilisis a tempor ut, pellentesque non urna.
            </p>
        </div>
        <div class="col md-4">
            <h3 class="display-3">Features</h3>
            <ul>
                <li>
                    Feature 1
                </li>
                
                <li>
                    Feature 2
                </li>
                
                <li>
                    Feature 3
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
