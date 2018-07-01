@extends('layouts.admin')

@section('content')

    @include('includes.notification')

    <div class="round-content">
        <div class="bg-title-search">
            <h5 style="margin-left:0px" class="pageheading">{{$student->family_name}} {{$student->given_name }}  ({{$student->jpa_graduation_year}}-{{$student->jpa_student_number}})</h5>
        </div>
        @if (! Auth::user()->hasRole('visitor'))
            <div style="padding: 5px 0px 5px 0px" class="col-sm-6">
                <a class="btn btn-sm btn-danger delete" href="{{route('change-status', [$student->student_id])}}"><span class="glyphicon glyphicon-trash"></span>Delete</a>
            </div>
        @endif
        <br>
        {{--<div class="container">--}}
            <div class="row">
                <div class="col-sm-12">
                    <?php $i = 0; ?>
                    @foreach($student_form_sections as $parent_form_section)
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}" class="collapsed" aria-expanded="false"><span class="glyphicon {{$parent_form_section->glyphicon}}"> </span>{{$parent_form_section->name}}</a> </h4>

                                    @if($i == 0)
                                        <img class="headshottitle" src="{{isset($student->student_photo) ? $app->make('url')->to('/images/students/'.$student->student_photo) : $app->make('url')->to('/images/no_photo.png') }}">
                                    @endif
                                </div> <!-- ./ panel-heading -->

                                <div id="collapse{{$i}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">

                                        <!-- BLUE PANEL 1  -->
                                        @if ( ! Auth::user()->hasRole('visitor'))
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>{{ __('label.to add or modify information press the update button') }}</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="{{ route('edit-student', [ $student->student_id, $parent_form_section->id ] ) }}" type="button" class="btn btn-primary btn-xs submitattach">
                                                        {{__('label.update')}}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                        @if( $parent_form_section->children->count() )
                                            @foreach( $parent_form_section->children as $child_form_section )
                                                <div class="well well-sm well-primary">
                                                    <label class="subheadOnBlue">{{$child_form_section->name}}</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <?php $student_form_properties = collect( $child_form_section->studentFormProperties )->sortBy( 'order' ); ?>
                                                            @include('includes.property')

                                                            @foreach( $child_form_section->children as $sub_child_form_section )
                                                                <div class="col-sm-12">
                                                                    <label class="subheadOnBlue">{{$sub_child_form_section->name}}</label>
                                                                </div>
                                                                <?php $student_form_properties = collect( $sub_child_form_section->studentFormProperties )->sortBy( 'order' ); ?>
                                                                @include('includes.property')
                                                            @endforeach
                                                        </div> <!--./ col-xs-12 -->
                                                    </div> <!--./ row -->
                                                </div> <!--./ well -->
                                            @endforeach
                                        @endif
                                    </div> <!--./ panel-body -->
                                </div> <!--./ panel-collapse -->
                            </div> <!--./ panel-default -->
                        </div> <!--./ panel-group -->
                        <?php $i++; ?>
                    @endforeach
                    <!-- static element start -->

                        <div class="panel-group" id="accordion">


                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" class="collapsed"><span class="glyphicon glyphicon-lock"> </span>Password Information</a> </h4>

                                </div>

                                <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                    replaces the div above -->

                                    <div class="panel-body">

                                        <!-- BLUE PANEL 1  Passwords and logins for anything-->
                                        <label>To add or modify information press the update button</label><button type="button" class="btn btn-primary btn-xs submitattach">Update</button>

                                        <div class="well well-sm well-primary">

                                            <div class="row">
                                                <div class="col-xs-4 bold">Account:</div>
                                                <div class="col-xs-4 bold">UserName:</div>
                                                <div class="col-xs-4 bold">Password:</div>
                                            </div>
                                            <label class="subheadOnBlue">School</label>
                                            <div class="row">
                                                <div class="col-xs-4 bold">Common App:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 bold">TOEFL:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">SSAT:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">SAT:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">IELTS:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">ACT:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">PLAN:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">EXPLORE:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">CSS:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">School App Login:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">School Grade Portal:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>								<div class="row">
                                                <div class="col-xs-4 bold">Payment Portal:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>



                                            <label class="subheadOnBlue">Frequent Flyers</label>
                                            <div class="row">
                                                <div class="col-xs-4 bold">SkyTeam - Korean Air:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 bold">OneWorld - American Airlines</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 bold">Star Alliance - United Air:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 bold">Air Asia:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 bold">Chine Eastern:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>

                                            <label class="subheadOnBlue">Finances</label>
                                            <div class="row">
                                                <div class="col-xs-4 bold">Bank Account:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>
                                            <label class="subheadOnBlue">Others</label>
                                            <div class="row">
                                                <div class="col-xs-4 bold">Smart Card:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 bold">Medical Insurance:</div>
                                                <div class="col-xs-4">student104</div>
                                                <div class="col-xs-4">235hsgnouj</div>
                                            </div>

                                        </div>

                                        <!-- PANEL BODY CLOSE  -->
                                    </div>

                                    <!-- PANEL COLLAPSE CLOSE  -->
                                </div>

                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                            </div>

                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                        </div>


                        <div class="panel-group" id="accordion">


                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-usd"> </span>Financial Information</a> </h4>

                                </div>

                                <div id="collapseFour" class="panel-collapse collapse">
                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                    replaces the div above -->

                                    <div class="panel-body">
                                        <!-- BLUE PANEL 1  -->
                                        <label>To add or modify information press the update button</label><button type="button" class="btn btn-primary btn-xs submitattach">Update</button>

                                        <div class="well well-sm well-primary">
                                            <label>Add a new transaction-bill</label><button type="button" class="btn btn-default btn-xs submitattach">Select</button>
                                            <div class="row">&nbsp;</div>
                                            <label>View the available financial record </label><button type="button" class="btn btn-default btn-xs submitattach">Select</button>
                                            <div class="row">&nbsp;</div>
                                        </div>
                                        <div class="well well-sm well-primary">
                                            <label>Upcoming Transactions</label>


                                            <div class="row">
                                                <div class="col-xs-3 bold">Rent</div>
                                                <div class="col-xs-9">$200.  Stamford University Housing Department - 24 July 2016</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Course Deposit</div>
                                                <div class="col-xs-9">$145.  Stamford University Admin Department - 30 July 2016</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Allowance</div>
                                                <div class="col-xs-9">$444. Srey Proh Sophal - 5 August 2016</div>
                                            </div>
                                        </div>



                                        <div class="well well-sm well-primary">
                                            <label>Recent Transactions (last 3 months)</label>


                                            <div class="row">
                                                <div class="col-xs-3 bold">VISA Fee</div>
                                                <div class="col-xs-9">$345 paid to the US Embassy Phnom Penh - July 2016</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Passport Fee</div>
                                                <div class="col-xs-9">$145 paid to the Cambodian Immigration Embassy Phnom Penh - July 2016</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Housing Fee</div>
                                                <div class="col-xs-9">$1234 paid to Stamford University - June 2016</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Book Fee</div>
                                                <div class="col-xs-9">$45 paid toStamford University - May 2016</div>
                                            </div>


                                        </div>




                                        <!-- BLUE PANEL 1  Details of contents go here. -->


                                        <!-- PANEL BODY CLOSE  -->
                                    </div>

                                    <!-- PANEL COLLAPSE CLOSE  -->
                                </div>

                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                            </div>

                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                        </div>

                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-paperclip"> </span>Documents/ Scans/ Attachments</a> </h4>

                            </div>

                            <div id="collapseFive" class="panel-collapse collapse">
                                <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                    <div id="collapseOne" class="panel-collapse collapse in">
                                replaces the div above -->

                                <div class="panel-body">




                                    <!-- PANEL 1 Drop down menu to select attachements -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="grantor">Type of Attachment</label>
                                                <select class="form-control" id="grantor">
                                                    <option>Select Attachment Type</option>
                                                    <option>Student Photographs</option>
                                                    <option>Passport Photos</option>
                                                    <option>Passport ID page</option>
                                                    <option>Passport Extension</option>
                                                    <option>Passport VISA Sticker</option>
                                                    <option>Student ID card</option>
                                                    <option>Parents ID card</option>
                                                    <option>Family Book</option>
                                                    <option>Birth Certificate</option>
                                                    <option>Marriage Certificate</option>
                                                    <option>Death Certificate</option>
                                                    <option>VISA Approval Letter</option>
                                                    <option>High School Diploma</option>
                                                    <option>NEP Documents</option>
                                                    <option>Transcripts</option>
                                                    <option>Award Certificates</option>
                                                    <option>Applications Submitted</option>
                                                    <option>Acceptance letters</option>
                                                    <option>Denial Letters</option>
                                                    <option>Reference Letters</option>
                                                    <option>External Test Results</option>
                                                    <option>Work samples - essays</option>
                                                    <option>Health Information</option>
                                                    <option>Insurance</option>
                                                    <option>Parent Agreement</option>
                                                    <option>Grade Release Form</option>
                                                    <option>Travel</option>
                                                    <option>Correspondence - Student</option>
                                                    <option>Correspondence - General</option>
                                                    <option>Financial</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>






                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="grantor">Add New Attachment</label>
                                                <select class="form-control" id="grantor">
                                                    <option>Select Attachment Type</option>
                                                    <option>Student Photographs</option>
                                                    <option>Passport Photos</option>
                                                    <option>Passport ID page</option>
                                                    <option>Passport Extension</option>
                                                    <option>Passport VISA Sticker</option>
                                                    <option>Student ID card</option>
                                                    <option>Parents ID card</option>
                                                    <option>Family Book</option>
                                                    <option>Birth Certificate</option>
                                                    <option>Marriage Certificate</option>
                                                    <option>Death Certificate</option>
                                                    <option>VISA Approval Letter</option>
                                                    <option>High School Diploma</option>
                                                    <option>NEP Documents</option>
                                                    <option>Transcripts</option>
                                                    <option>Award Certificates</option>
                                                    <option>Applications Submitted</option>
                                                    <option>Acceptance letters</option>
                                                    <option>Denial Letters</option>
                                                    <option>Reference Letters</option>
                                                    <option>External Test Results</option>
                                                    <option>Work samples - essays</option>
                                                    <option>Health Information</option>
                                                    <option>Insurance</option>
                                                    <option>Parent Agreement</option>
                                                    <option>Grade Release Form</option>
                                                    <option>Travel</option>
                                                    <option>Correspondence - Student</option>
                                                    <option>Correspondence - General</option>
                                                    <option>Financial</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BLUE PANEL 1  attachments selected that are in the system -->
                                    <div class="well well-sm well-primary">


                                        <label>Available Attachments of type selected</label><button type="button" class="btn btn-default btn-xs submitattach">Submit Selection</button>

                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Graduation - taken 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Running Club - taken 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">1st day of College - taken 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Assembly - taken 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Student Council - taken 2015</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Robotics Club - taken 2014</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>



                                        <label class="subheadOnBlue">Click submit to download or view your selection/s</label><button type="button" class="btn btn-default btn-xs submitattach">Submit Selection</button>

                                    </div>








                                    <!-- BLUE PANEL 2 all attachments avaliable -->

                                    <div class="well well-sm well-primary">
                                        <label>All Attachments Available</label><button type="button" class="btn btn-default btn-xs submitattach">Submit Selection</button>

                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Graduation - taken 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Running Club - taken 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">1st day of College - taken 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Assembly - taken 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Student Council - taken 2015</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student Photographs</div> <div class="col-xs-6">Robotics Club - taken 2014</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Passport Photo</div> <div class="col-xs-6">Blue background taken 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Passport Photo</div> <div class="col-xs-6">White background taken 2013</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Passport ID page</div> <div class="col-xs-6">-</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Passport Extension</div> <div class="col-xs-6">Extended in 2015 expires 2025</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Passport VISA Sticker</div> <div class="col-xs-6">2015 expires 2016</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Student ID card</div> <div class="col-xs-6">2015 expires 2025</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Parents ID card</div> <div class="col-xs-6">Mother expires 2025</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Parents ID card</div> <div class="col-xs-6">Father expires 2025</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Family Book</div> <div class="col-xs-6">2010</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">Birth Certificate</div> <div class="col-xs-6">Issued 2002</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">High School Diploma</div> <div class="col-xs-6">JPA year 12 Graduate</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">NEP Document</div> <div class="col-xs-6">Khmer year 12 exam certificate</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 bold">NEP Document</div> <div class="col-xs-6">Khmer year 11 exam certificate</div><label class="checkbox-inline"><input type="checkbox" value="">Open</label><label class="checkbox-inline"><input type="checkbox" value="">Download</label>
                                        </div>


                                        <label class="subheadOnBlue">Click submit to download or view your selection/s</label><button type="button" class="btn btn-default btn-xs submitattach">Submit Selection</button>

                                    </div>






                                    <!-- PANEL BODY CLOSE  -->
                                </div>

                                <!-- PANEL COLLAPSE CLOSE  -->
                            </div>

                            <!-- PANEL PANEL DEFAULT CLOSE  -->

                        </div>


                        <div class="panel-group" id="accordion">


                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" class="collapsed"><span class="glyphicon glyphicon-education"> </span>Grades, Awards, Discipline</a> </h4>


                                </div>

                                <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                    replaces the div above -->

                                    <div class="panel-body">
                                        <!-- BLUE PANEL 1  -->
                                        <label>To be added</label><button type="button" class="btn btn-primary btn-xs submitattach">Update</button>

                                        <div class="well well-sm well-primary">
                                            <label>To be added</label><button type="button" class="btn btn-default btn-xs submitattach">Select</button>
                                            <div class="row">&nbsp;</div>
                                            <label>To be added</label><button type="button" class="btn btn-default btn-xs submitattach">Select</button>
                                            <div class="row">&nbsp;</div>
                                        </div>
                                        <div class="well well-sm well-primary">
                                            <label>To be added</label>


                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                        </div>



                                        <div class="well well-sm well-primary">
                                            <label>To be added</label>


                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>


                                        </div>




                                        <!-- BLUE PANEL 1  Details of contents go here. -->


                                        <!-- PANEL BODY CLOSE  -->
                                    </div>

                                    <!-- PANEL COLLAPSE CLOSE  -->
                                </div>

                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                            </div>

                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                        </div>

                        <div class="panel-group" id="accordion">


                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseStudentApp" aria-expanded="false" class="collapsed"><span class="glyphicon glyphicon-inbox"> </span>Applications</a> </h4>

                                </div>

                                <div id="collapseStudentApp" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                    replaces the div above -->

                                    <div class="panel-body">

                                        <!-- BLUE PANEL 1  STUDENT PROFILE INFORMATION-->
                                        <label>To add or modify information press the update button</label><button type="button" class="btn btn-primary btn-xs submitattach">Update</button>

                                        <div class="well well-sm well-primary">
                                            <label class="subheadOnBlue">Identification</label>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Given Name:</div>
                                                <div class="col-xs-3">Srey Proh</div>
                                                <div class="col-xs-3 bold">Date of Birth:</div>
                                                <div class="col-xs-3">30 September 1999</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Family Name:</div>
                                                <div class="col-xs-3">Sophanya</div>
                                                <div class="col-xs-3 bold">JPA Graduation Year:</div>
                                                <div class="col-xs-3">Class of 2017</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Khmer Name:</div>
                                                <div class="col-xs-3">ប៊ូ ស្រីមុំ</div>
                                                <div class="col-xs-3 bold">JPA Student Number:</div>
                                                <div class="col-xs-3">00973</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Gender:</div>
                                                <div class="col-xs-3">Female</div>
                                                <div class="col-xs-3 bold">Status:</div>
                                                <div class="col-xs-3">Attending Stamford College</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">JATS Status:</div>
                                                <div class="col-xs-3">Ongoing</div>
                                                <div class="col-xs-3 bold">School Student Number:</div>
                                                <div class="col-xs-3">045784215AB</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Current Grade-Location:</div>
                                                <div class="col-xs-3">Grade 11 - JPA</div>
                                                <div class="col-xs-3 bold">Expected Graduation:</div>
                                                <div class="col-xs-3">30 June 2020</div>

                                            </div>
                                        </div>




                                        <!-- SUB SECTION 1 APPICATION 1 -->
                                        <div class="panel-group" id="accordion">


                                            <div class="panel panel-default">

                                                <div class="panel-heading">
                                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseAppOne"><span class="glyphicon glyphicon-folder-open"> </span>00973 Srey Sophanya - Culver Academy 2016-17 - IN PROGRESS</a> </h4>

                                                </div>

                                                <div id="collapseAppOne" class="panel-collapse collapse">
                                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                                    replaces the div above -->

                                                    <div class="panel-body">
                                                        <!-- BLUE PANEL 1  -->
                                                        <label>School Information</label><button type="button" class="btn btn-primary btn-xs submitattach">Update</button>


                                                        <div class="well well-sm well-primary">
                                                            <label>School Information</label>


                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Name:</div>
                                                                <div class="col-xs-3">Culver Academy</div>
                                                                <div class="col-xs-2 bold">Phone General:</div>
                                                                <div class="col-xs-5">+1 200 5987 5698</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Address:</div>
                                                                <div class="col-xs-3">
                                                                    CULVER ACADEMIES<br>
                                                                    1300 ACADEMY RD.<br>
                                                                    CULVER, IN 46511
                                                                </div>
                                                                <div class="col-xs-2 bold">Email General:</div>
                                                                <div class="col-xs-5">
                                                                    culveradmin@culveracademy.org
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Contact Person:</div>
                                                                <div class="col-xs-3">Major Culver Contacter</div>
                                                                <div class="col-xs-2 bold">Email Direct:</div>
                                                                <div class="col-xs-5">culverapplications@culveracademy.org</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Phone Contact:</div>
                                                                <div class="col-xs-3">+1 200 5987 5698</div>
                                                                <div class="col-xs-2 bold">Website:</div>
                                                                <div class="col-xs-3">https://www.culver.org/</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Notes:</div>
                                                                <div class="col-xs-10">These are notes where any useful information about the school can be recorded. It may be general or specific - basically anything that might help provide detail to anyone viewing this application.</div>
                                                            </div>
                                                        </div>



                                                        <div class="well well-sm well-primary">
                                                            <label>Application Information</label>


                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Application Deadline:</div>
                                                                <div class="col-xs-9">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Essays:</div>
                                                                <div class="col-xs-2 bold">No.Required:</div>
                                                                <div class="col-xs-2">3</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Essay 1</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Essay1 Attachment</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Essay 2</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Essay2 Attachment</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Prepared</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Essay 3</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank"></a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Incomplete</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Exams:</div>
                                                                <div class="col-xs-2 bold">No.Required:</div>
                                                                <div class="col-xs-2">3</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Exam 1: </div>
                                                                <div class="col-xs-4">Online</div>
                                                                <div class="col-xs-2 bold">Date:</div>
                                                                <div class="col-xs-3">30 April 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Exam 2: </div>
                                                                <div class="col-xs-4">At JPA</div>
                                                                <div class="col-xs-2 bold">Date:</div>
                                                                <div class="col-xs-3">30 June 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Exam 2: </div>
                                                                <div class="col-xs-4">At Culver</div>
                                                                <div class="col-xs-2 bold">Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Parents Permission:</div>
                                                                <div class="col-xs-4">Parent Approval Submitted</div>
                                                                <div class="col-xs-2 bold">Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-xs-12"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Parent approval Attachment</a></div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Recommendations:</div>
                                                                <div class="col-xs-2 bold">No.Required:</div>
                                                                <div class="col-xs-2">3</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Recommendation 1</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Recommendation Mr Teacher</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Recommendation 2</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Recommendation Ms Educator</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Recommendation 3</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Recommendation Mr Sports</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Prepared</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Interview:</div>
                                                                <div class="col-xs-2 bold">Number:</div>
                                                                <div class="col-xs-2">3</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-3">Interview 1: </div>
                                                                <div class="col-xs-4">Sykpe</div>
                                                                <div class="col-xs-2">9.16am</div>
                                                                <div class="col-xs-3">30 April 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Phone or skype address and contact name etc - any interview details before or after.</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Interview 2: </div>
                                                                <div class="col-xs-4">Telephone</div>
                                                                <div class="col-xs-2">11.16am</div>
                                                                <div class="col-xs-3">30 May 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Phone or skype address and contact name etc - any interview details before or after.</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Interview 3: </div>
                                                                <div class="col-xs-4">In Person</div>
                                                                <div class="col-xs-2">9.00am</div>
                                                                <div class="col-xs-3">30 July 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Phone or skype address and contact name etc - any interview details before or after.</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12 bold">Additional Information Requests:</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Health Certificate:</div>
                                                                <div class="col-xs-4">TB Administration Certificate</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 July 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-7"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 TB Certificate</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Notes about the special request.</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Participation Certificate:</div>
                                                                <div class="col-xs-4">Angkor Marathon Certificate</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 July 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-7"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Ankgor Marathon 2013</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Notes about the special request.</div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <div class="form-group">
                                                                        <label for="risk2" class="healthLabelColor">Update Application Status:</label>
                                                                        <div class="btn-group btn-group default " role="group">
                                                                            <button type="button" class="btn btn-default">In Progress</button>
                                                                            <button type="button" class="btn btn-default">Completed</button>
                                                                            <button type="button" class="btn btn-default">Accepted</button>
                                                                            <button type="button" class="btn btn-default">Denied</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="risk2" class="healthLabelColor">&nbsp;</label>
                                                                    <button type="button" class="btn btn-success btn-sm col-md-12">To Update the Status - Select the new Status and click here.</button>

                                                                </div>
                                                            </div>

                                                        </div>

                                                        <!-- PANEL BODY CLOSE  -->
                                                    </div>



                                                    <!-- PANEL COLLAPSE CLOSE  -->
                                                </div>

                                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                                            </div>

                                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                                        </div>





                                        <!-- SUB SECTION 2 APPICATION 2 -->
                                        <div class="panel-group" id="accordion">


                                            <div class="panel panel-default">

                                                <div class="panel-heading">
                                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseAppTwo"><span class="glyphicon glyphicon-folder-open"> </span>00973 Srey Sophanya - Swiss Boarding School 2016-17 - DENIED</a> </h4>

                                                </div>

                                                <div id="collapseAppTwo" class="panel-collapse collapse">
                                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                                    replaces the div above -->

                                                    <div class="panel-body">
                                                        <!-- BLUE PANEL 1  -->
                                                        <label>School Information</label><button type="button" class="btn btn-primary btn-xs submitattach">Update</button>


                                                        <div class="well well-sm well-primary">
                                                            <label>School Information</label>


                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Name:</div>
                                                                <div class="col-xs-3">Culver Academy</div>
                                                                <div class="col-xs-2 bold">Phone General:</div>
                                                                <div class="col-xs-5">+1 200 5987 5698</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Address:</div>
                                                                <div class="col-xs-3">
                                                                    CULVER ACADEMIES<br>
                                                                    1300 ACADEMY RD.<br>
                                                                    CULVER, IN 46511
                                                                </div>
                                                                <div class="col-xs-2 bold">Email General:</div>
                                                                <div class="col-xs-5">
                                                                    culveradmin@culveracademy.org
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Contact Person:</div>
                                                                <div class="col-xs-3">Major Culver Contacter</div>
                                                                <div class="col-xs-2 bold">Email Direct:</div>
                                                                <div class="col-xs-5">culverapplications@culveracademy.org</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Phone Contact:</div>
                                                                <div class="col-xs-3">+1 200 5987 5698</div>
                                                                <div class="col-xs-2 bold">Website:</div>
                                                                <div class="col-xs-3">https://www.culver.org/</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-2 bold">Notes:</div>
                                                                <div class="col-xs-10">These are notes where any useful information about the school can be recorded. It may be general or specific - basically anything that might help provide detail to anyone viewing this application.</div>
                                                            </div>
                                                        </div>



                                                        <div class="well well-sm well-primary">
                                                            <label>Application Information</label>


                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Application Deadline:</div>
                                                                <div class="col-xs-9">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Essays:</div>
                                                                <div class="col-xs-2 bold">No.Required:</div>
                                                                <div class="col-xs-2">3</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Essay 1</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Essay1 Attachment</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Essay 2</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Essay2 Attachment</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Prepared</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Essay 3</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank"></a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Incomplete</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Exams:</div>
                                                                <div class="col-xs-2 bold">No.Required:</div>
                                                                <div class="col-xs-2">3</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Exam 1: </div>
                                                                <div class="col-xs-4">Online</div>
                                                                <div class="col-xs-2 bold">Date:</div>
                                                                <div class="col-xs-3">30 April 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Exam 2: </div>
                                                                <div class="col-xs-4">At JPA</div>
                                                                <div class="col-xs-2 bold">Date:</div>
                                                                <div class="col-xs-3">30 June 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Exam 2: </div>
                                                                <div class="col-xs-4">At Culver</div>
                                                                <div class="col-xs-2 bold">Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Parents Permission:</div>
                                                                <div class="col-xs-4">Parent Approval Submitted</div>
                                                                <div class="col-xs-2 bold">Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-xs-12"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Parent approval Attachment</a></div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Recommendations:</div>
                                                                <div class="col-xs-2 bold">No.Required:</div>
                                                                <div class="col-xs-2">3</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Recommendation 1</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Recommendation Mr Teacher</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Recommendation 2</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Recommendation Ms Educator</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Recommendation 3</div>
                                                                <div class="col-xs-4"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Recommendation Mr Sports</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Prepared</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-xs-3 bold">Interview:</div>
                                                                <div class="col-xs-2 bold">Number:</div>
                                                                <div class="col-xs-2">3</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 September 2016</div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-3">Interview 1: </div>
                                                                <div class="col-xs-4">Sykpe</div>
                                                                <div class="col-xs-2">9.16am</div>
                                                                <div class="col-xs-3">30 April 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Phone or skype address and contact name etc - any interview details before or after.</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Interview 2: </div>
                                                                <div class="col-xs-4">Telephone</div>
                                                                <div class="col-xs-2">11.16am</div>
                                                                <div class="col-xs-3">30 May 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Phone or skype address and contact name etc - any interview details before or after.</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Interview 3: </div>
                                                                <div class="col-xs-4">In Person</div>
                                                                <div class="col-xs-2">9.00am</div>
                                                                <div class="col-xs-3">30 July 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Phone or skype address and contact name etc - any interview details before or after.</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12 bold">Additional Information Requests:</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Health Certificate:</div>
                                                                <div class="col-xs-4">TB Administration Certificate</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 July 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-7"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 TB Certificate</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Notes about the special request.</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">Participation Certificate:</div>
                                                                <div class="col-xs-4">Angkor Marathon Certificate</div>
                                                                <div class="col-xs-2 bold">Due Date:</div>
                                                                <div class="col-xs-3">30 July 2016</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-7"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">2016-00956 Ankgor Marathon 2013</a></div>
                                                                <div class="col-xs-2 bold">Status:</div>
                                                                <div class="col-xs-3">Submitted</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3">&nbsp;</div>
                                                                <div class="col-xs-9">Notes about the special request.</div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-12">&nbsp;</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <div class="form-group">
                                                                        <label for="risk2" class="healthLabelColor">Update Application Status:</label>
                                                                        <div class="btn-group btn-group default " role="group">
                                                                            <button type="button" class="btn btn-default">In Progress</button>
                                                                            <button type="button" class="btn btn-default">Completed</button>
                                                                            <button type="button" class="btn btn-default">Accepted</button>
                                                                            <button type="button" class="btn btn-default">Denied</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="risk2" class="healthLabelColor">&nbsp;</label>
                                                                    <button type="button" class="btn btn-success btn-sm col-md-12">To Update the Status - Select the new Status and click here.</button>

                                                                </div>
                                                            </div>
                                                        </div>



                                                        <!-- PANEL BODY CLOSE  -->
                                                    </div>



                                                    <!-- PANEL COLLAPSE CLOSE  -->
                                                </div>

                                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                                            </div>

                                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                                        </div>



                                        <!-- INSERT APPLICATION PANELS FINISH HERE -->



                                        <!-- PANEL BODY CLOSE  -->
                                    </div>



                                    <!-- PANEL COLLAPSE CLOSE  -->
                                </div>

                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                            </div>

                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                        </div>


                        <div class="panel-group" id="accordion">


                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"><span class="glyphicon glyphicon-plus"> </span>Health Information</a> </h4>

                                </div>

                                <div id="collapseEight" class="panel-collapse collapse">
                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                    replaces the div above -->

                                    <div class="panel-body">
                                        <!-- BLUE PANEL 1  -->

                                        <div class="well well-sm well-primary">
                                            <label class="subheadOnBlue">Identification</label>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Given Name:</div>
                                                <div class="col-xs-3">Srey Proh</div>
                                                <div class="col-xs-3 bold">Date of Birth:</div>
                                                <div class="col-xs-3">30 September 1999</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Family Name:</div>
                                                <div class="col-xs-3">Sophanya</div>
                                                <div class="col-xs-3 bold">JPA Graduation Year:</div>
                                                <div class="col-xs-3">Class of 2017</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Khmer Name:</div>
                                                <div class="col-xs-3">ប៊ូ ស្រីមុំ</div>
                                                <div class="col-xs-3 bold">JPA Student Number:</div>
                                                <div class="col-xs-3">00973</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Gender:</div>
                                                <div class="col-xs-3">Female</div>
                                                <div class="col-xs-3 bold">Status:</div>
                                                <div class="col-xs-3">Attending Stamford College</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">JATS Status:</div>
                                                <div class="col-xs-3">Ongoing</div>
                                                <div class="col-xs-3 bold">School Student Number:</div>
                                                <div class="col-xs-3">045784215AB</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Current Location:</div>
                                                <div class="col-xs-3">Holiday - Cambodia</div>
                                                <div class="col-xs-3 bold">Expected Graduation:</div>
                                                <div class="col-xs-3">30 June 2020</div>

                                            </div>
                                        </div>
                                        <!-- BLUE PANEL 2  -->
                                        <label>To add or modify information press the update button</label><button type="button" class="btn btn-primary btn-xs submitattach">Update</button>

                                        <div class="well well-sm well-primary">
                                            <label class="subheadOnBlue">General Medical Records</label>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Cambodian Physician:</div>
                                                <div class="col-xs-3">Doctor Healthcare</div>
                                                <div class="col-xs-3 bold">Allergies:</div>
                                                <div class="col-xs-3">Peanuts/Shellfish</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Sports/Exercise Restrictions:</div>
                                                <div class="col-xs-3">Cannot Run</div>
                                                <div class="col-xs-3 bold">Chronic Medical Condition:</div>
                                                <div class="col-xs-3">Tinitis</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">EpiPen Required:</div>
                                                <div class="col-xs-3">No</div>
                                                <div class="col-xs-3 bold">Psychiatric Condition:</div>
                                                <div class="col-xs-3">Depression</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Medications and Doses:</div>
                                                <div class="col-xs-3">Tabletipirin - 3 x per day</div>
                                                <div class="col-xs-3 bold">Health Care Provider:</div>
                                                <div class="col-xs-3">Aetna Insurance Company</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-3 bold">Medical Insurance No:</div>
                                                <div class="col-xs-3">125HTE151561A</div>
                                                <div class="col-xs-3 bold">Insurance End Date:</div>
                                                <div class="col-xs-3">30 September 2016</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Medical Insurance Details:</div>
                                                <div class="col-xs-3">
                                                    <p>John Contact Person<br>
                                                        Medical insurance Company<br>
                                                        www.medinsurance.com<br>
                                                        +1 33 5421 5453452<br>
                                                        24532 NAME OF STREET, <br>
                                                        NAME OF SUBURB<br>
                                                        STATE NAME<br>
                                                        USA<br>
                                                        Postcode/Zip: 245868
                                                    </p></div>

                                                <div class="col-xs-3 bold">Overseas Doctor:</div>
                                                <div class="col-xs-3">
                                                    <p>Dr. Johns Hopkins<br>
                                                        Medical Centre Chicago<br>
                                                        www.doctormd.com<br>
                                                        +1 33 5421 5453452<br>
                                                        24532 NAME OF STREET, <br>
                                                        NAME OF SUBURB<br>
                                                        STATE NAME<br>
                                                        USA<br>
                                                        Postcode/Zip: 245868
                                                    </p></div>

                                            </div>

                                        </div>
                                        <!-- BLUE PANEL 3  Details of contents go here. -->
                                        <label>To view a specific record type - make a selection then press the View button</label>

                                        <div class="well well-sm well-primary">

                                            <label class="subheadOnBlue">View a Specific Medical Record</label>



                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group   healthLabelColor">
                                                        <label for="grantor">Select the type of record to view:</label>
                                                        <select class="form-control" id="grantor">
                                                            <option>Select Record</option>
                                                            <option>Tetraxim-Tetanus/Diphtheria/Pertussis/Polio</option>
                                                            <option>Tetanus/Diphtheria/Pertussis</option>
                                                            <option>Tetanus booster</option>
                                                            <option>Polio</option>
                                                            <option>Hepatitis A</option>
                                                            <option>Hepatitis B</option>
                                                            <option>HPV</option>
                                                            <option>MMR - Measles/Mumps/Rubella</option>
                                                            <option>Measles</option>
                                                            <option>Mumps</option>
                                                            <option>Rubellas</option>
                                                            <option>Varicella - Chicken Pox</option>
                                                            <option>Varicella - Chicken Pox - Documentation of exposure by HCP</option>
                                                            <option>Meningitis</option>
                                                            <option>PPD/TST - Mantoux in mm</option>
                                                            <option>Meningococcal</option>
                                                            <option>TB Questionaire</option>
                                                            <option>TB Skin Test</option>
                                                            <option>TB X-Ray</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="subheadOnBlue healthLabelColor">View Selected</label>
                                                    <button type="button" class="btn btn-default btn-sm heathViewBtn">&nbsp;View Selected&nbsp;</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Record Type:</div>
                                                <div class="col-xs-3"><b>Tetanus/Diphtheria/Pertussis</b></div>
                                                <div class="col-xs-3 bold">Type - DPT or DTap:</div>
                                                <div class="col-xs-3">DTap</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Date Created:</div>
                                                <div class="col-xs-3">30 September 2016</div>
                                                <div class="col-xs-3 bold">Created By:</div>
                                                <div class="col-xs-3">JPA Nursing Staff</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Date Updated:</div>
                                                <div class="col-xs-3">30 November 2016</div>
                                                <div class="col-xs-3 bold">Updated By:</div>
                                                <div class="col-xs-3">JPA Admin Staff</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">&nbsp;</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Completed:</div>
                                                <div class="col-xs-3">Yes</div>
                                                <div class="col-xs-3 bold">Date Completed/Due Date:</div>
                                                <div class="col-xs-3">30 September 2016</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Adinistration Date:</div>
                                                <div class="col-xs-3">30 September 2016</div>
                                                <div class="col-xs-3 bold">Next Administration Date:</div>
                                                <div class="col-xs-3">30 September 2016</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Doses for Compliance:</div>
                                                <div class="col-xs-3">3 Doses</div>
                                                <div class="col-xs-3 bold">Doses Recieved:</div>
                                                <div class="col-xs-3">3 Doses</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Validity End Date:</div>
                                                <div class="col-xs-3">30 September 2016</div>
                                                <div class="col-xs-3 bold">Renewal Date:</div>
                                                <div class="col-xs-3">30 September 2016</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Specific Results:</div>
                                                <div class="col-xs-3">14 mm injection</div>
                                                <div class="col-xs-3 bold">Attachments:</div>
                                                <div class="col-xs-3"><a class="attachmentHealthHyper" href="docs/00973-General-Report.pdf" target="_blank">Certificate of TDP</a></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">Notes:</div>
                                                <div class="col-xs-9">Any notes that are relevant to this current record are listed here. It could be about administration - when, where, how, why or why not. It may be noted that the record is incomplete and why. It can state almost anything you like - to assist with understanding.</div>
                                            </div>

                                        </div>
                                        <!-- BLUE PANEL 4  Details of contents go here. -->
                                        <label>To add a new record press the Add Record button</label><button type="button" class="btn btn-primary btn-xs submitattach">Add Record</button>

                                        <div class="well well-sm well-primary">


                                            <label class="subheadOnBlue">Complete Health Records</label>
                                            <div class="row">
                                                <div class="col-xs-7 bold lineSpaceBase">Record</div>
                                                <div class="col-xs-4 bold lineSpaceBase">Status - Due Date/Date Completed</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Tetanus/Diphtheria/Pertussis:</div>
                                                <div class="col-xs-4">Yes - 30 September 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Tetanus Booster:</div>
                                                <div class="col-xs-4">No - 30 September 2021</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Polio:</div>
                                                <div class="col-xs-4">Yes - 1 January 2012</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Hepatitis A:</div>
                                                <div class="col-xs-4">Yes - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Hepatitis B:</div>
                                                <div class="col-xs-4">Yes - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">HPV:</div>
                                                <div class="col-xs-4">Yes - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">MMR - Measles/Mumps/Rubella:</div>
                                                <div class="col-xs-4">Yes - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Measles:</div>
                                                <div class="col-xs-4">No - -</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Mumps:</div>
                                                <div class="col-xs-4">No - -</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Rubella:</div>
                                                <div class="col-xs-4">No - -</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Varicella - Chicken Pox:</div>
                                                <div class="col-xs-4">Yes - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Varicella - Chicken Pox - Documentation of exposure by HCP:</div>
                                                <div class="col-xs-4">No - -</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Meningitis:</div>
                                                <div class="col-xs-4">Yes - 30 September 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">PPD/TST:</div>
                                                <div class="col-xs-4">Yes - 30 September 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Meningococcal:</div>
                                                <div class="col-xs-4">Yes - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">TB Skin Test:</div>
                                                <div class="col-xs-4">Yes - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">TB Questionaire:</div>
                                                <div class="col-xs-4">Yes - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">TB X-Ray:</div>
                                                <div class="col-xs-4">In Progress - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 bold">Other - Diabetes Check:</div>
                                                <div class="col-xs-4">Yes - 30 september 2016</div>
                                                <button type="button" class="btn btn-default btn-xs heathViewBtn">View</button>

                                            </div>









                                        </div>


                                        <!-- PANEL BODY CLOSE  -->
                                    </div>

                                    <!-- PANEL COLLAPSE CLOSE  -->
                                </div>

                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                            </div>

                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                        </div>


                        <div class="panel-group" id="accordion">


                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine"><span class="glyphicon glyphicon-bullhorn"> </span>Event Information</a> </h4>

                                </div>

                                <div id="collapseNine" class="panel-collapse collapse">
                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                    replaces the div above -->

                                    <div class="panel-body">

                                        <!-- BLUE PANEL 1  List of All STUDENT EVENT Records-->

                                        <label>To add a new Event press the Add Event button</label><button type="button" class="btn btn-primary btn-xs submitattach">Add Event</button>

                                        <div class="well well-sm well-primary">

                                            <label class="subheadOnBlue">Complete Event Records</label>
                                            <div class="row">
                                                <div class="col-xs-6 bold lineSpaceBase">Event - Invitations to Upcoming</div>
                                                <div class="col-xs-3 bold lineSpaceBase">Date</div>
                                                <div class="col-xs-3 bold lineSpaceBase">Attendance</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 bold">Pannasastra Alumni 2017</div>
                                                <div class="col-xs-3">30 April 2017</div>
                                                <div class="col-xs-3">Invited</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">JPA Graduation 2017</div>
                                                <div class="col-xs-3">30 April 2017</div>
                                                <div class="col-xs-3">Invited</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    &nbsp;
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold lineSpaceBase">Event - Completed</div>
                                                <div class="col-xs-3 bold lineSpaceBase">Date</div>
                                                <div class="col-xs-3 bold lineSpaceBase">Attendance</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">Cambodian Alumni June 2014</div>
                                                <div class="col-xs-3">1 June 2014</div>
                                                <div class="col-xs-3">Attended</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 bold">Pannasastra Alumni 2015</div>
                                                <div class="col-xs-3">30 April 2015</div>
                                                <div class="col-xs-3">Attended</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">JPA Graduation 2015</div>
                                                <div class="col-xs-3">30 May 2015</div>
                                                <div class="col-xs-3">Excused</div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">Cambodian Alumni June 2015</div>
                                                <div class="col-xs-3">1 June 2015</div>
                                                <div class="col-xs-3">Absent</div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">Pannasastra Alumni 2016</div>
                                                <div class="col-xs-3">30 April 2016</div>
                                                <div class="col-xs-3">Absent</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">JPA Graduation 2016</div>
                                                <div class="col-xs-3">30 May 2016</div>
                                                <div class="col-xs-3">Absent</div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">Cambodian Alumni June 2016</div>
                                                <div class="col-xs-3">1 June 2016</div>
                                                <div class="col-xs-3">Absent</div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">Pannasastra Alumni 2017</div>
                                                <div class="col-xs-3">30 April 2017</div>
                                                <div class="col-xs-3">Absent</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">JPA Graduation 2017</div>
                                                <div class="col-xs-3">30 May 2017</div>
                                                <div class="col-xs-3">Absent</div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 bold">Cambodian Alumni June 2017</div>
                                                <div class="col-xs-3">1 June 2017</div>
                                                <div class="col-xs-3">Absent</div>

                                            </div>

                                        </div>











                                        <!-- PANEL BODY CLOSE  -->
                                    </div>

                                    <!-- PANEL COLLAPSE CLOSE  -->
                                </div>

                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                            </div>

                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                        </div>


                        <div class="panel-group" id="accordion">


                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen"><span class="glyphicon glyphicon-plane"> </span>Travel Information</a> </h4>

                                </div>

                                <div id="collapseTen" class="panel-collapse collapse">
                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                    replaces the div above -->

                                    <div class="panel-body">
                                        <!-- BLUE PANEL 1  -->
                                        <label>To be added</label><button type="button" class="btn btn-primary btn-xs submitattach">Update</button>

                                        <div class="well well-sm well-primary">
                                            <label>To be added</label><button type="button" class="btn btn-default btn-xs submitattach">Select</button>
                                            <div class="row">&nbsp;</div>
                                            <label>To be added</label><button type="button" class="btn btn-default btn-xs submitattach">Select</button>
                                            <div class="row">&nbsp;</div>
                                        </div>
                                        <div class="well well-sm well-primary">
                                            <label>To be added</label>


                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                        </div>



                                        <div class="well well-sm well-primary">
                                            <label>To be added</label>


                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 bold">To be added</div>
                                                <div class="col-xs-9">To be added</div>
                                            </div>


                                        </div>




                                        <!-- BLUE PANEL 1  Details of contents go here. -->


                                        <!-- PANEL BODY CLOSE  -->
                                    </div>



                                    <!-- PANEL COLLAPSE CLOSE  -->
                                </div>

                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                            </div>

                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                        </div>


                        <div class="panel-group" id="accordion">


                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseNumber" aria-expanded="false" class="collapsed"><span class="glyphicon glyphicon-plus-sign"> </span>Another Information Section</a> </h4>

                                </div>

                                <div id="collapseNumber" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <!-- to change this panel to appear open when arriving on the page - add "in" to collapseOne class.
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                    replaces the div above -->

                                    <div class="panel-body">

                                        <!-- BLUE PANEL 1  Details of contents go here. -->


                                        <!-- PANEL BODY CLOSE  -->
                                    </div>

                                    <!-- PANEL COLLAPSE CLOSE  -->
                                </div>

                                <!-- PANEL PANEL DEFAULT CLOSE  -->
                            </div>

                            <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                        </div>

                    <!-- ./static element end -->
                </div> <!-- ./col-md-10 -->
            </div> <!-- ./row -->
        {{--</div> <!-- ./container -->--}}
    </div> <!-- end round content -->

@stop
