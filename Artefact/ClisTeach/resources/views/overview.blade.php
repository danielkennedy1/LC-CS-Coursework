@extends("layouts.clisteach")
@section("body-attribs")
background="images/loginforest.jpg"
style="background-attachment:fixed;background-repeat:no-repeat"
@endsection
@section("content")
<div class="container">
    @include("components.navbar")
    <div class="text-center  md-12 glass" style="margin:15vh 0px">
        <h1 class="display-1">
        Website Overview
        </h1>
    </div>
    <div class="text-center md-12 glass" style="margin:15vh 0px">

            <h1>Welcome/landing page</h1>
            <p>Click <a href="{{ route("home") }}">here</a> to look at the main welcome / landing page. This is what users first see when accessing the site.</p>


            <h1>About us</h1>
            <p>Click <a href="{{ route("about") }}">here</a> to view the about us page. Users can access this to find out about the vision and/or experience and education of leadership and staff members.</p>


            <h1>Product Range</h1>
            <p>Click <a href="{{ route("products") }}">here</a> to see the "all products" page, with headings and space for different categories and a "featured products" bar.  Two example product pages are set up to show how induvidual product pages work. </p>


            <h1>Mission Statement</h1>
            <p>Click <a href="{{ route("mission") }}">here</a> to see the page intended for communicating the mission statement of the company to its users.</p>


            <h1>Example Dashboard</h1>
            <p>Click <a href="{{ route("dashboard") }}">here</a> to use an example dashboard, capable of controlling the smart plug using buttons on the webpage.</p>

    </div>
</div> 
@endsection