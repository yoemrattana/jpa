@include('includes.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 left-section">
            <form role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="leftColJatsType">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                            @if( Session::has( 'message' ) )
                                <span class="help-block">
                                    <strong style="color: red">{{session( 'message' )}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="leftColJatsType">Password</label>

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success btn-sm col-sm-12 buttonLink">
                        Login
                    </button>
            </form>
        </div> <!--./col-xs-4-->

        <div class="col-sm-8">
            <div class="bg-title-search">
                <p class="head-msg">JPA Alumni Tracking Software - JATS</p>
            </div>
            <p class="wellcome-msg">Welcome to the JPA Alumni Tracking software - JATS.<br>
                JATS is designed to enable you to enter, track, view and print student and school records - login on the right hand side to gain access.<br>
                Finding information in JATS is mainly based around the students graduating class year and student numbers. If you are looking for a school you can search by its' name.<br>
                An example of this would be a student from the class of 2021 whose student number is 01643.<br>
                Their JATS ID would be 2021-01643. With this number any record linked to this student can be viewed and updated.<br>
                If you do not know this number it can be found in the <b class="textBold">student</b> section of the website.
            </p>
        </div> <!--./col-8-->
    </div> <!-- .row -->
</div> <!--./container-->
@include('includes.footer')