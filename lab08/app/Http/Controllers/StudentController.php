<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Rules\AlphaNumeric;
use Illuminate\Http\Request;

// ...

class StudentController extends Controller
{
    // ...
    public function show(Student $student){
        return view('student', [
            'student' => $student
        ]);
    }
    // Show Search Form
    public function showSearchForm(){
        return view('searchForm');
    }

    // Search By Student Id
    public function search(Request $request){
        $searchField = $request->validate([
            'query' => ['required', new AlphaNumeric]
        ], [
            'query.required' => (new AlphaNumeric)->requiredMessage(),
        ]);

        $query = $request->input('query');
        
        // Perform a basic search by student id
        $students = Student::where('student_id', 'like', '%' . $query . '%')->get();

        return view('studentList', [
            'students' => $students
        ]);
    }
}
