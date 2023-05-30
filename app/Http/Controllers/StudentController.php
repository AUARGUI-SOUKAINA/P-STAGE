<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentCredentials;

class StudentController extends Controller
{
        public function index(){
            $students = \App\Models\User::where('usertype', 'student')->get();
                return view('admin.students.liste_students',['students' => $students]);
        } 
        


//////////*******************DELETE************************///////////////// 

  
public function destroy($id)
{
        $student = User::find($id);
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }
    
        if ($student->delete()) {
            return redirect()->back()->with('success', 'Student deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Error deleting student');
        }

}
        
        

        
//////////*******************ADD************************/////////////////   
        public function createS()
        {
                $groups = Group::all();
                return view('admin.students.add_student', ['groups' => $groups]);
        }
        public function storeS(Request $request)
        {
                
        // Validate the request data
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
        'group' => 'required|exists:groups,id'
        
        ]);

        // Create the new student
        $student = new User;
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->password = Hash::make($validatedData['password']);
        $groupId = $request->input('group');
        $student->usertype = 'student';
        $student->save();
        $group = Group::findOrFail($validatedData['group']);
        $student->group()->associate($group);
        $student->save();

        // Send email to the student with their login credentials
    Mail::to($student->email)->send(new StudentCredentials($student, $validatedData['password']));

    // Redirect back to the students index page
    return redirect()->route('listS')->with('success', 'Student added successfully.');
}

//////////*******************EDIT************************/////////////////   


public function edit($id)
{
    $student = User::findOrFail($id);
    $groups = Group::all();
    return view('admin.students.edit_student', compact('student', 'groups'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'group' => 'required|exists:groups,id'
    ]);

    // Find the student by ID
    $student = User::findOrFail($id);

    // Update the student's information
    $student->name = $validatedData['name'];
    $student->email = $validatedData['email'];
    $student->group = $validatedData['group'];
    $student->save();

    return redirect()->route('listeS')->with('success', 'Student updated successfully.');
}

}

