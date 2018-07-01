@include('includes.header')

<!-- START OF NAVIGATION -->

@include('includes.top-nav')

<!-- END OF NAVIGATION -->
<p></p>
<br />
<!--
<div class="base-level">
    <div class="content">
    -->

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="noi-dung">
                    @yield('content')
                    </div>
                </div>
            </div>
        </div>
    <!--
    </div>
</div>
-->
<!-- BASE LEVEL END -->
<!--FOOTER-->

@include('includes.footer')