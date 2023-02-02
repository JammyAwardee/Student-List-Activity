<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\Paginator;

class StudentController extends Controller
{
    
    public function index() 
    {
        
        $data = array("students" => DB::table('students')->orderBy('created_at', 'desc')->simplePaginate(12));
        
        return view('students.index', $data);
    }

    public function show($id) {
        $data = Students::findOrFail($id);
        return view('students.edit', ['student' => $data]);
    }

    public function create() {
        return view('students.create')->with('title', 'Add New');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:2'],
            "last_name" => ['required', 'min:2'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students','email')],            
       ]);

        Students::create($validated);

        return redirect('/')->with('message', 'New Student was added successfully!');
    }

    public function update(Request $request, Students $student) {
        // dd($request);
        $validated = $request->validate([
            "first_name" => ['required', 'min:2'], 
            "last_name" => ['required', 'min:2'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email'],            
       ]); 

       $student->update($validated);

       return redirect('/')->with('message', 'Data was successfully updated');
    }

    public function destroy(Students $student) {
        $student->delete();
        return redirect('/')->with('message','Data was successfully deleted');
    }

    public function search(Request $request) {
        $q = ($request->input('q'));
	if($q != ''){
		$data =Students::where('first_name','like','%'.$q.'%')->orWhere('last_name','like','%'.$q.'%')->orWhere('email','like','%'.$q.'%')->orWhere('gender','like',$q.'%')->orWhere('age','like','%'.$q.'%')->paginate(12)->setpath('');
		$data->appends(array(
           'q' => $request->input('q'),
		));
		if(count($data)>0){
                return view('students.index', ['students' => $data]);
		}
		return redirect('/')->with('message', 'No results found!');
	}
    return redirect('/')->with('message', 'Please search by first name, last name or email');
    }
  }
