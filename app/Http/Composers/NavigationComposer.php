<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use App\StudentProperty;
use App;

class NavigationComposer
{
    protected $_jpa_graduation_years = [];

    public function __construct()
    {
        $jpa_graduation_years = [];
        $student_properties = StudentProperty::where('student_property_name', 'jpa_graduation_year')->get();
        foreach($student_properties as $student_property) {
            $nest_array = [];
            foreach($student_property->studentPropertyValues as $student_property_value) {
                $nest_array['year'] = (int)$student_property_value->property_value;
                $jpa_graduation_years[] = $nest_array;
            }
        }
        //$this->_jpa_graduation_years = collect(array_unique($jpa_graduation_years))->sort()->values()->all();
        $this->_jpa_graduation_years = collect($jpa_graduation_years)->sortByDesc('year')->unique()->values()->all();
    }

    public function compose( View $view )
    {
        $view->with( 'jpa_graduation_years', $this->_jpa_graduation_years );
    }
}