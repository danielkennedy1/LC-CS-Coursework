@extends("layouts.clisteach")
@section("body-attribs")

@endsection
@section("content")
    <div class="container">
        @include("components.navbar")
        <div class="row">
            <h1 class="display-1">
                My Devices
            </h1>
        </div>
        <hr>
        <div class="row" style="text-align:center">
            <div class="col md-4">1</div>
            <div class="col md-4">Smart plug</div>
            <div class="col md-4">
                <button class="btn btn-danger" onclick="flickSwitch(0)">Off</button>
                <button class="btn btn-success" onclick="flickSwitch(1)">On</button>
            </div>
        </div>
        <hr>
    </div>
    <script>
        function flickSwitch(val){
            if(val == "0" || val == "1"){
                var i = document.createElement("img");
                i.src = "/switch/" + val;
            }else{
                console.log("Invalid value");
            }
        }
    </script>
@endsection