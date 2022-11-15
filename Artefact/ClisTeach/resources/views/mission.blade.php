@extends("layouts.clisteach")
@section("title")
    Clisteach Mission Statement
@endsection
@section("body-attribs")
background="/images/Ocean.jpg"
style="background-repeat:no-repeat;
        background-attachment:fixed;
        background-position:center; 
        height:100%;
        background-size:cover
"
@endsection
@section("content")
<div class="container">
    @include("components.navbar")
    <article class="glass my-3"  style="z-index:-100">
        <h1 class="display-3">Our Mission Statement</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam justo augue, aliquam vitae rutrum et, ultricies sed libero. Phasellus blandit vel turpis fermentum efficitur. Pellentesque nec quam nec turpis accumsan ultricies. Vestibulum at ullamcorper purus, nec blandit erat. Donec sollicitudin ultrices efficitur. Vivamus egestas massa sit amet diam malesuada semper. Etiam posuere eu turpis at imperdiet. Nam sed magna quis justo pulvinar tincidunt. Praesent felis sapien, vehicula non tristique et, venenatis eu ligula. Morbi mollis pharetra aliquam. Etiam nec ligula est. Aliquam mattis a sem non rhoncus. Morbi auctor nunc ac egestas sollicitudin.</p>

            <p>Mauris nec vehicula nisi, eu ornare diam. Donec luctus erat vel magna condimentum consequat. Nam eu lorem egestas, mattis lectus quis, blandit sem. Nam interdum id tortor sed aliquet. Vestibulum tempus accumsan orci sit amet vehicula. Cras ex erat, volutpat quis purus eget, sollicitudin suscipit augue. Morbi sed aliquam neque. Phasellus ullamcorper nec felis ut tempus. Pellentesque vitae eros ac neque ullamcorper maximus. Sed sit amet est lacus.</p>

            <p>Donec purus felis, mollis id velit quis, elementum vestibulum lacus. In id ante eu metus efficitur tempus id quis nibh. Mauris eget urna eu enim ultricies ultrices ut sed nisl. Pellentesque mollis, nulla vel maximus pulvinar, tortor orci egestas ante, nec ornare enim nibh ac nisl. Nulla eu ipsum felis. Duis lorem massa, feugiat sed rutrum id, hendrerit quis erat. In rutrum tristique dui vel congue. Nullam feugiat dolor nisl, id dignissim odio sagittis a. Morbi efficitur eget sem sit amet hendrerit. Sed nec feugiat ante. Fusce in tellus lacus. Maecenas dolor justo, volutpat at enim sed, condimentum congue urna. Sed vitae iaculis ligula. Proin lobortis consequat nisl, congue commodo ex lacinia ac. Nam faucibus vehicula nunc eu volutpat.</p>

            <p>Vestibulum quis imperdiet lacus. Morbi vitae ultrices est. Ut aliquet, nulla et dignissim lobortis, turpis purus facilisis erat, eget maximus dolor metus vitae arcu. Proin erat tortor, faucibus in eros quis, pellentesque lacinia lectus. Morbi semper lacus sed libero pellentesque varius. Quisque non risus ac turpis lobortis lacinia eu non neque. Suspendisse pharetra elit vel dui aliquet consectetur. Mauris augue ante, aliquet eget dignissim sed, posuere ut lorem. Suspendisse nec efficitur ex. Quisque vestibulum lacinia quam, non lobortis lacus cursus eu. Morbi a sodales erat.</p>

            <p>Morbi ornare risus in nisl vulputate sagittis. Nam ultricies in mauris id lacinia. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum sem id sapien sagittis vehicula. Sed vitae accumsan felis. Morbi porta viverra purus in porttitor. Vestibulum ullamcorper ipsum in dolor molestie blandit. Suspendisse in dolor est. Curabitur fringilla, mauris a laoreet tempus, urna elit eleifend tellus, id iaculis ligula ipsum et libero. Duis eu vulputate est.</p>
    </article>
</div>
@endsection