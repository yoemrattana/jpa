<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use App\StudentPropertyValue;
use App\StudentFormSection;
use App\StudentProperty;
use App\PropertyTypeValue;
use App;
use App\Http\StudentAttribute;
use Lang;
use Session;
use Illuminate\Support\Facades\DB;

class AdminStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //App::setLocale('kh');
        App::setLocale( session( 'locale' ));
        if ( ! Session::has('locale') ) {
            App::setLocale('en');
        }

        $student_property_values = StudentPropertyValue::all();
        $property_type_values = PropertyTypeValue::all();

        $students = $this->getStudentAttributes(Student::where('status', 1)->get());
        $students_by_year = $students->groupBy( 'jpa_graduation_year' );
        //dump($students->where('jpa_graduation_year', 2019));

        return view( 'admin.student.index', compact( 'students_by_year', 'student_property_values', 'property_type_values' ) );
    }

    public function search(Request $request)
    {
        App::setLocale( session( 'locale' ));
        if ( ! Session::has('locale') ) {
            App::setLocale('en');
        }
        $student_property_values= StudentPropertyValue::all();
        $property_type_values = PropertyTypeValue::all();
        //

        $students = [];
        $student_query = DB::table('student_property_values AS pri')
            ->where('pri.student_property_id', '=', 11);

        if (trim($request->first_name) != '') {
            $student_query = $student_query->join('student_property_values AS fn', function ($join) use ($request) {
                $join->on('pri.student_id', '=', 'fn.student_id')
                    ->where('fn.student_property_id', '=', 11)
                    ->where('fn.property_value', 'like', '%'.$request->first_name.'%');
            });
        }

        if (trim($request->last_name) != '') {
            $student_query = $student_query->join('student_property_values AS ln', function ($join) use ($request) {
                $join->on('pri.student_id', '=', 'ln.student_id')
                    ->where('ln.student_property_id', '=', 13)
                    ->where('ln.property_value', 'like', '%'.$request->last_name.'%');
            });
        }

        if (trim($request->student_number) != '') {
            $student_query = $student_query->join('student_property_values AS sn', function ($join) use ($request) {
                $join->on('pri.student_id', '=', 'sn.student_id')
                    ->where('sn.student_property_id', '=', 16)
                    ->where('sn.property_value', 'like', '%'.$request->student_number.'%');
            });
        }

        $student_ids = array_map(function($elem){return $elem->student_id;},
                                 $student_query->get(array('pri.student_id'))->toArray());
        $students = $this->getStudentAttributes(Student::find($student_ids));
        $students_by_year = $students->where('student_status', 1)->groupBy( 'jpa_graduation_year' );
        //
        Session::flash('first_name', $request->first_name);
        Session::flash('last_name', $request->last_name);
        Session::flash('student_number', $request->student_number);
        
        return view( 'admin.student.index', compact( 'students_by_year', 'student_property_values', 'property_type_values' ) );
    }

    private function getStudentAttributes($students)
    {
        $student_attribute = new StudentAttribute();
        $_students = array();
        foreach( $students as $student ) {
            $_students[] = $student_attribute->set_attribute( $student->id );
        }

        return collect($_students)->sortByDesc('jpa_graduation_year');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //App::setLocale('en');
        App::setLocale( session( 'locale' ));
        if ( ! Session::has('locale') ) {
            App::setLocale('en');
        }
        $student_form_sections = StudentFormSection::with( 'children' )
            ->whereNull( 'parent_student_form_section_id' )
            ->orderBy( 'student_form_name', 'desc' )
            ->get();

        return view( 'admin.student.create', compact( 'student_form_sections' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $student_id = Student::insertGetId([]);

        foreach( $inputs as $student_property_id => $property_value ) {

            if ( $file = $request->file( $student_property_id ) ) {
                $photo_name = time() . $file->getClientOriginalName();
                $file->move( public_path() . '/images/students/', $photo_name );

                if ( str_contains( $student_property_id, 'photoAdd') ) {
                    $_student_property_id = class_basename( $student_property_id );
                    StudentPropertyValue::create([
                        'student_id' => $student_id,
                        'student_property_id' => $_student_property_id,
                        'property_value' => $photo_name
                    ]);
                }
            }

            if ( str_contains( $student_property_id,  'selectAdd' ) ) {
                if ( $property_value != '' ) {
                    $_student_property_id = class_basename( $student_property_id );
                    StudentPropertyValue::create([
                        'student_id' => $student_id,
                        'student_property_id' => $_student_property_id,
                        'property_type_value_id' => $property_value,
                    ]);
                }
            }

            if ( str_contains( $student_property_id, 'add' ) ) {
                if ( $property_value != '' ) {
                    $_student_property_id = class_basename( $student_property_id );
                    StudentPropertyValue::create([
                        'student_id' => $student_id,
                        'student_property_id' => $_student_property_id,
                        'property_value' => $property_value
                    ]);
                }
            }

        }
        Session::flash( 'message', 'The student has been created!' );
        return redirect("students/{$student_id}/detail");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id = $student_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //App::setLocale('en');
        App::setLocale( session( 'locale' ) );
        if ( ! Session::has('locale') ) {
            App::setLocale('en');
        }
        // check if student's status is available or not
        if(! Student::findOrFail($id)->status) {
            abort(404);
        }

        Student::findOrFail( $id );
        $student_attribute = new StudentAttribute();
        $student = $student_attribute->set_attribute( $id );

        $student_form_sections = StudentFormSection::with( 'children' )
            ->whereNull( 'parent_student_form_section_id' )
            ->orderBy( 'student_form_name', 'desc' )
            ->get();

        return view( 'admin.student.selected', compact( 'student_form_sections', 'id', 'student' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id, $parent_form_id )
    {
        // check if student's status is available or not
        if(! Student::findOrFail($id)->status) {
            abort(404);
        }
        //App::setLocale('en');
        App::setLocale( session( 'locale' ) );
        if ( ! Session::has('locale') ) {
            App::setLocale('en');
        }

        $student_form_sections = StudentFormSection::with( 'children' )
            ->whereNull( 'parent_student_form_section_id' )
            ->where( 'id', $parent_form_id )
            ->orderBy( 'student_form_name', 'desc' )
            ->get();

        return view( 'admin.student.edit', compact( 'student_form_sections', 'id', 'parent_form_id' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $student_property_value = new StudentPropertyValue();
        $inputs = $request->all();

        $photo = [];
        $new_photo = [];
        foreach ( $inputs as $student_property_id => $property_value ) {

            if ( $file = $request->file( $student_property_id ) ) {
                $photo_name = time() . $file->getClientOriginalName();
                $file->move( public_path() . '/images/students/', $photo_name );

                if ( str_contains( $student_property_id, 'photoAdd') ) {
                    $_student_property_id = class_basename( $student_property_id );
                    $new_photo['photo_name'] = $photo_name;
                    $new_photo['student_property_id'] = $_student_property_id;
                }

                if ( is_numeric( $student_property_id ) ) {
                    $photo['photo_name'] = $photo_name;
                    $photo['student_property_value_id'] = $student_property_id;
                }
            }

            /*
             * update the existing value
             * */
            if ( str_contains( $student_property_id, 'editSelect' ) ) {
                $student_property_value_id = class_basename( $student_property_id );
                $student_property_value->where( 'id', $student_property_value_id )
                    ->update( ['property_type_value_id' => $property_value] );
            }

            if ( is_numeric( $student_property_id ) ) {
                $student_property_value->where( 'id', $student_property_id )
                    ->update( ['property_value' => $property_value] );
            }

            /*
             * insert new property value
             * */
            if ( str_contains( $student_property_id, 'add' ) ) {
                if ( $property_value != '' ) {
                    $_student_property_id = class_basename( $student_property_id );
                    $student_property_value->create([
                        'student_id'            => $id,
                        'student_property_id'   => $_student_property_id,
                        'property_value'        => $property_value
                    ]);
                }
            }

            if ( str_contains( $student_property_id,  'selectAdd' ) ) {
                if ( $property_value != '' ) {
                    $_student_property_id = class_basename( $student_property_id );
                    $student_property_value->create([
                        'student_id'                => $id,
                        'student_property_id'       => $_student_property_id,
                        'property_type_value_id'    => $property_value
                    ]);
                }
            }

        }

        if ( ! empty( $photo ) ) {
            $student_property_value->where( 'id', $photo['student_property_value_id'] )
                ->update( ['property_value' => $photo['photo_name']] );
        }

        if ( ! empty( $new_photo ) ) {
            print_r( $new_photo );
            $student_property_value->create([
                'student_id'            => $id,
                'student_property_id'   => $new_photo['student_property_id'],
                'property_value'        => $new_photo['photo_name']
            ]);
        }

        $parent_form_id = $request->parent_form_id;

        Session::flash( 'message', 'The student has been updated!' );
        //return redirect("/students/{$id}/{$parent_form_id}/edit");
        return redirect("/students/{$id}/detail");
        //return redirect()->route('students.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function getStudentsByGraduationYear($year)
    {
        if( ! is_numeric( $year ) ) {
            abort(404);
        }

        $students = $this->getStudentAttributes(Student::all())->where('jpa_graduation_year', $year)->where('student_status', 1);
        return view( 'admin.student.show-by-year', compact( 'year', 'students' ) );
    }

    public function changeStatus($student_id)
    {
        $student = Student::where('id', $student_id)->update(['status' => 0]);

        Session::flash('message', 'The student has been deleted!');
        return redirect('students');
    }
}