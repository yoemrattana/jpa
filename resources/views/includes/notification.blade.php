<div class="row">
    <div class="col-sm-10">
        @if( Session::has( 'message' ) )
            <div id="info" class="alert alert-success" > {{ session( 'message' ) }} </div>
        @endif
    </div>
</div>