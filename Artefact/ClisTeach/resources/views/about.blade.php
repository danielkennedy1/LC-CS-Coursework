@extends("layouts.clisteach")
@section("title")
ClisTeach About Us
@endsection
@section("body-attribs")
background="/images/Factory.jpeg.webp"
style="background-repeat:no-repeat;
        background-attachment:fixed;
        background-size:cover
"
@endsection
@section("content")
<div class="container">
    @include("components.navbar")
    <!--Person A-->
    <div class="card mb-3 my-5 glass" style="z-index:-1">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/images/Michael.png" class="card-img img-fluid" alt="Our founder">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Person A - Co-Founder & CEO</h5>
                    <p class="card-text"> Here's some info about the person</p>
                </div>
            </div>
        </div>
    </div>
    <!--Person B-->
    <div class="card mb-3 my-5 glass">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Person B - Co-Founder & CTO</h5>
                    <p class="card-text"> Here's some info about the person</p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="/images/Pam.jpg" class="card-img img-fluid" alt="Our CTO">
            </div>
        </div>
    </div>
        <!--Person C-->
    <div class="card mb-3 my-5 glass">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/images/Stanley.jpg" class="card-img img-fluid" alt="Our Chairman & CFO">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Person C - Chairman & CFO</h5>
                    <p class="card-text"> Here's some info about the person</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection