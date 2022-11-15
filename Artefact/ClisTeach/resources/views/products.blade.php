@extends("layouts.clisteach")
@section("title")
Clisteach Products
@endsection
@section("content")
    <div class="container">
        @include("components.navbar")
        @include("components.featured")
        <h1 class="display-3">Categories</h1>
        <div class="row">
            <div class="col md-3">
                <h5>Security</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris gravida euismod lorem, eu suscipit purus rhoncus in. Donec aliquet commodo velit, sed commodo mi dignissim in. Ut luctus est lacinia urna aliquet, sit amet euismod odio interdum. Vestibulum quis dignissim purus, nec eleifend quam. Aliquam vitae purus non lectus condimentum lacinia. Fusce tincidunt felis eget velit consectetur, a euismod est aliquet. Integer ac nibh dictum, commodo lectus vel, lobortis leo. Nulla ac diam id leo molestie ultrices in vitae enim. In bibendum nunc neque, quis viverra diam porta sit amet. Integer quam justo, facilisis a tempor ut, pellentesque non urna.
                </p>
                <a class="btn btn-primary">Shop Security</a>
            </div>
            <div class="col md-3">
                <h5>Food</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris gravida euismod lorem, eu suscipit purus rhoncus in. Donec aliquet commodo velit, sed commodo mi dignissim in. Ut luctus est lacinia urna aliquet, sit amet euismod odio interdum. Vestibulum quis dignissim purus, nec eleifend quam. Aliquam vitae purus non lectus condimentum lacinia. Fusce tincidunt felis eget velit consectetur, a euismod est aliquet. Integer ac nibh dictum, commodo lectus vel, lobortis leo. Nulla ac diam id leo molestie ultrices in vitae enim. In bibendum nunc neque, quis viverra diam porta sit amet. Integer quam justo, facilisis a tempor ut, pellentesque non urna.
                </p>
                <a class="btn btn-primary">Shop Food</a>
            </div>
            <div class="col md-3">
                <h5>Cleaning</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris gravida euismod lorem, eu suscipit purus rhoncus in. Donec aliquet commodo velit, sed commodo mi dignissim in. Ut luctus est lacinia urna aliquet, sit amet euismod odio interdum. Vestibulum quis dignissim purus, nec eleifend quam. Aliquam vitae purus non lectus condimentum lacinia. Fusce tincidunt felis eget velit consectetur, a euismod est aliquet. Integer ac nibh dictum, commodo lectus vel, lobortis leo. Nulla ac diam id leo molestie ultrices in vitae enim. In bibendum nunc neque, quis viverra diam porta sit amet. Integer quam justo, facilisis a tempor ut, pellentesque non urna.
                </p>
                <a class="btn btn-primary">Shop Cleaning</a>
            </div>
            <div class="col md-3">
                <h5>Lighting</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris gravida euismod lorem, eu suscipit purus rhoncus in. Donec aliquet commodo velit, sed commodo mi dignissim in. Ut luctus est lacinia urna aliquet, sit amet euismod odio interdum. Vestibulum quis dignissim purus, nec eleifend quam. Aliquam vitae purus non lectus condimentum lacinia. Fusce tincidunt felis eget velit consectetur, a euismod est aliquet. Integer ac nibh dictum, commodo lectus vel, lobortis leo. Nulla ac diam id leo molestie ultrices in vitae enim. In bibendum nunc neque, quis viverra diam porta sit amet. Integer quam justo, facilisis a tempor ut, pellentesque non urna.
                </p>
                <a class="btn btn-primary">Shop Lighting</a>
            </div>
        </div>
    </div>
@endsection