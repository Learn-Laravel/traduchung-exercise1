<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->students = new Student;
    }
    private $students;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentPhnom_Penh = $this->students->getStudentsFromPhnomPenh();
        return response()->json($studentPhnom_Penh);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataUpdate = [
            'name' => $request->name,
            'age' => $request->age, 
            'location' => $request->location,
        ];
        $this->students->updateRow($dataUpdate, $id);
        return response()->json(['message'=>'success'], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if($student) {
            $student->delete();
            return response()->json(['message'=>'success'], 200);
        }
        else {
            return response()->json(['message'=>'invalid'], 404);
        }
    }
}
