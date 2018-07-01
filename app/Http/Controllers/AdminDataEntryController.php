<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\StudentProperty;
use App\StudentPropertyValue;
use App\StudentFormSection;
use App\PropertyTypeValue;

use App;
use Lang;
use Session;

class AdminDataEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('en');
        $student_form_sections = StudentFormSection::with( 'children' )
            ->whereNull( 'parent_student_form_section_id' )
            ->orderBy( 'student_form_name', 'desc' )
            ->get();
        
        return view( 'admin.dataentry.index', compact( 'student_form_sections' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //return $inputs;

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
                $_student_property_id = class_basename( $student_property_id );
                StudentPropertyValue::create([
                    'student_id' => $student_id,
                    'student_property_id' => $_student_property_id,
                    'property_type_value_id' => $property_value,
                ]);
            }

            if ( str_contains( $student_property_id, 'add' ) ) {
                $_student_property_id = class_basename( $student_property_id );
                StudentPropertyValue::create([
                    'student_id' => $student_id,
                    'student_property_id' => $_student_property_id,
                    'property_value' => $property_value
                ]);
            }

        }


        Session::flash( 'message', 'The student has been updated!' );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
