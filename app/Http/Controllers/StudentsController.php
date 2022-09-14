<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;
use Datatables;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index()
    // {        
    //     $students = Student::paginate(10);
 
    //     return view('students.index', compact('students'));
    // }
 
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function allow($id)
    // {
    //     $students = Student::find($id);
  
    //     return response()->json($students);
    // }


    public function trial()
    {
        $students = Student::all();
  
        return response()->json($students);
    }
    public function try()
    {        
        $students = Student::paginate(10);
 
        return view('students.all', compact('students'));
    }



    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Student::create(array_merge($request->only('name', 'phone', 'grade'),[
            'user_id' => auth()->id()
        ]));

        return redirect()->route('students.try')
            ->withSuccess(__('student created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
   
    public function show($id)
    {

        $student = Student::find($id);

       

        return view('students.show', compact('student','id'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {

        //get specific categories and its translations
        $student = Student::find($id);

       

        return view('students.edit', compact('student','id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->only('name', 'phone', 'grade'));

        return redirect()->route('students.index')
            ->withSuccess(__('student updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
  

    public function destroy($id)
    {

        //get specific categories and its translations
        $student = Student::find($id);

        $student->delete();

        return view('students.all', compact('student','id'));
    }
}