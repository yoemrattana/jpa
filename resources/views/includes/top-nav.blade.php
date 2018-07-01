{{--<div class="container">--}}
<nav>
    <ul>
        <li class="dropdownjpa">
            <a href="{{route('home.index')}}" class="dropbtnjpa {{Request::segment(1) == 'home' ? 'active' : ''}}">{{__('label.home')}}</a>
            <div class="dropdownjpa-content">
                {{--<a href="todo.html">To Do List</a>--}}
                {{--<a href="jats-calendar.html">Calendar</a>--}}
                {{--<a href="home-events.html">Events</a>--}}

                {{--<a href="index.html">Logout</a>--}}
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{__('label.logout')}}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </div>
        </li>

        @if ( Auth::user()->hasRole( 'staff' ) || Auth::user()->hasRole( 'visitor' ) )
            <li class="dropdownjpa">
            <a href="{{Auth::user()->hasRole( 'visitor' ) ? route('read-student') : route('students.index')}}" class="dropbtnjpa {{Request::segment(1) == 'read-student' ? 'active' : ''}} {{Request::segment(1) == 'students' ? 'active' : ''}} {{Request::segment(1) == 'show-student' ? 'active' : ''}}">{{__('label.students')}}</a>
            <div class="dropdownjpa-content">
                    @foreach( $jpa_graduation_years as $jpa_graduation_year)
                        <a href="{{route('students.showByYear', $jpa_graduation_year['year'])}}">{{__('label.class of')}} {{$jpa_graduation_year['year']}}</a>
                    @endforeach
                </div>
            </li>
        @endif

        @role('admin')
            <li class="dropdownjpa">
                <a href="{{route('students.index')}}" class="dropbtnjpa {{Request::segment(1) == 'students' ? 'active' : ''}}">{{__('label.students')}}</a>
                <div class="dropdownjpa-content">
                    @foreach( $jpa_graduation_years as $jpa_graduation_year)
                        <a href="{{route('students.showByYear', $jpa_graduation_year['year'])}}">{{__('label.class of')}} {{$jpa_graduation_year['year']}}</a>
                    @endforeach
                </div>
            </li>
        @endrole


        {{--<li class="dropdownjpa">--}}
            {{--<a href="{{route('schools.index')}}" class="dropbtnjpa">Schools</a>--}}
            {{--<div class="dropdownjpa-content">--}}
                {{--<a href="school/school-high">High/Boarding Schools</a>--}}
                {{--<a href="school/school-local">Cambodian Colleges</a>--}}
                {{--<a href="school/school-overseas">Overseas Colleges</a>--}}
                {{--<a href="school/school-graduate">Graduate Schools</a>--}}
                {{--<a href="school/school-postgraduate">Post-Grad Records</a>--}}
                {{--<a href="school/school-scholarship">Scholarships</a>--}}
            {{--</div>--}}
        {{--</li>--}}


        {{--<li class="dropdownjpa">--}}
            {{--<a href="tracking-home.html" class="dropbtnjpa">Tracking</a>--}}
            {{--<div class="dropdownjpa-content">--}}
                {{--<a href="tracking-application">Application</a>--}}
                {{--<a href="tracking-accepted">Accepted</a>--}}
                {{--<a href="tracking-ongoing">Ongoing</a>--}}
                {{--<a href="tracking-postgraduate">Post-Graduate</a>--}}
                {{--<a href="tracking-scholarship">Scholarships</a>--}}
            {{--</div>--}}
        {{--</li>--}}


        {{--<li class="dropdownjpa">--}}
            {{--<a href="finance-home.html" class="dropbtnjpa">Finances</a>--}}
            {{--<div class="dropdownjpa-content">--}}
                {{--<a href="finance/studentfinance.html">Student</a>--}}
                {{--<a href="finance/schoolfinance.html">School</a>--}}
                {{--<a href="finance/scholarshipfinance.html">Scholarship</a>--}}
                {{--<a href="finance/otherfinance.html">Other</a>--}}
            {{--</div>--}}
        {{--</li>--}}


        {{--<li class="dropdownjpa">--}}
            {{--<a href="search-home.html" class="dropbtnjpa">Search/Reports</a>--}}
            {{--<div class="dropdownjpa-content">--}}
                {{--<a href="search.html">All Areas</a>--}}
                {{--<a href="search/student.html">Student</a>--}}
                {{--<a href="search/attachment.html">Attachment</a>--}}
                {{--<a href="search/school.html">School</a>--}}
                {{--<a href="search/application.html">Application</a>--}}
                {{--<a href="search/finance.html">Finance</a>--}}
                {{--<a href="search/health.html">Health</a>--}}
                {{--<a href="search/todo.html">Upcoming Dates</a>--}}
                {{--<a href="search/printpdf.html">Generate a PDF report</a>--}}
            {{--</div>--}}
        {{--</li>--}}

        @role('staff')
            {{--<li class="dropdownjpa">--}}
                {{--<a href="{{route('dataentry.index')}}" class="dropbtnjpa">Data Entry</a>--}}
            {{--</li>--}}
        @endrole

        @role('admin')
            <li class="dropdownjpa">
                <a href="{{route('users.index')}}" class="dropbtnjpa {{Request::segment(1) == 'users' ? 'active' : ''}}">User Management</a>
            </li>
         @endrole

        {{--<li class="dropdownjpa">--}}
            {{--<a href="docs/JATSHelpMenuInstructions.pdf"  target="_blank" class="dropbtnjpa">Help</a>--}}
            {{--<div class="dropdownjpa-content">--}}
                {{--<a href="docs/JATSHelpMenuInstructions.pdf" target="_blank">All Help information</a>--}}
                {{--<a href="docs/JATSHelpMenuInstructions.pdf" target="_blank">Find a student</a>--}}
                {{--<a href="docs/JATSHelpMenuInstructions.pdf" target="_blank">Find a school</a>--}}
                {{--<a href="docs/JATSHelpMenuInstructions.pdf" target="_blank">Find an Application</a>--}}
                {{--<a href="docs/JATSHelpMenuInstructions.pdf" target="_blank">How to Print</a>--}}
                {{--<a href="docs/JATSHelpMenuInstructions.pdf" target="_blank">How to make a PDF Report</a>--}}
                {{--<a href="docs/JATSHelpMenuInstructions.pdf" target="_blank">How to create/alter a Student</a>--}}
                {{--<a href="docs/JATSHelpMenuInstructions.pdf" target="_blank">How to create/alter a School</a>--}}
                {{--<a href="docs/JATSHelpMenuInstructions.pdf" target="_blank">How to create/alter an Application</a>--}}
            {{--</div>--}}
        {{--</li>--}}

        <li class="dropdownjpa pull-right">
            <div class="locale-switch">
                {!! Form::open(['method' => 'POST', 'route' => 'changelocale', 'class' => 'form-inline navbar-select']) !!}

                <div class="form-group @if($errors->first('locale')) has-error @endif">
                    <span aria-hidden="true"><i class="fa fa-flag"></i></span>
                    {!! Form::select(
                        'locales',
                        ['en' => 'EN', 'kh' => 'KH'],
                        \App::getLocale(),
                        [
                            'id'       => 'locales',
                            'class'    => 'form-control',
                            'required' => 'required',
                            'onchange' => 'this.form.submit()',
                        ]
                    ) !!}
                    <small class="text-danger">{{ $errors->first('locales') }}</small>
                </div>

                <div class="btn-group pull-right sr-only">
                    {!! Form::submit("Change", ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </li>

    </ul>


</nav>
{{--</div>--}}