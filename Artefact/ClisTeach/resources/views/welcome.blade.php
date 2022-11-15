@extends("layouts.clisteach")
@section("title")
    Clisteach Homepage
@endsection
@section("body-attribs")
background="/images/forest.jpg"
style="background-repeat:no-repeat;
        background-attachment:fixed
"
@endsection
@section("content")
<div class="container">
@include("components.navbar")
    <div class="text-center  md-12" style="margin:30vh 0px">
        <h1 class="display-1">
        <img src="/apple-icon.png" alt="logo" style="height:1em;vertical-align:baseline">
        ClisTeach
        </h1>
        <p class="display-5">Smart homes for a better future</p>
    </div>
    <article class="glass">
        @include("components.featured")
        <h1 class="display-3">Some Info</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris gravida euismod lorem, eu suscipit purus rhoncus in. Donec aliquet commodo velit, sed commodo mi dignissim in. Ut luctus est lacinia urna aliquet, sit amet euismod odio interdum. Vestibulum quis dignissim purus, nec eleifend quam. Aliquam vitae purus non lectus condimentum lacinia. Fusce tincidunt felis eget velit consectetur, a euismod est aliquet. Integer ac nibh dictum, commodo lectus vel, lobortis leo. Nulla ac diam id leo molestie ultrices in vitae enim. In bibendum nunc neque, quis viverra diam porta sit amet. Integer quam justo, facilisis a tempor ut, pellentesque non urna.</p>

        <p>Pellentesque vel sem mi. Suspendisse viverra, turpis id fermentum elementum, nibh erat vehicula tellus, mattis porttitor elit neque vel mi. Praesent dignissim euismod orci nec rutrum. Donec egestas nulla leo, a hendrerit velit eleifend ac. Morbi blandit facilisis nibh, et facilisis neque lacinia ac. Vivamus vitae leo enim. Curabitur a tincidunt ipsum. Curabitur magna tortor, eleifend vel diam eu, luctus commodo felis. Quisque condimentum sem in viverra iaculis. In et sagittis erat, eget condimentum arcu. Pellentesque nec tortor sem. In ornare mattis viverra. Aliquam faucibus sollicitudin dignissim. Nulla et interdum sapien.</p>

        <p>Proin nec massa a dui aliquam tempus. Cras eget laoreet mi. Vestibulum sit amet dui at nibh placerat imperdiet non vel nisi. Integer tempor id risus a consequat. Pellentesque quis lorem tincidunt arcu tincidunt fringilla id quis ligula. Sed eget dictum urna. Sed ut ornare nisl. Phasellus eget posuere nisi. Morbi tincidunt interdum ligula nec maximus. Pellentesque porta ex eu dolor convallis commodo.</p>
    </article>
</div> 
@endsection