<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeacherCredentials;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    

    public function index(){
        $teachers = \App\Models\User::where('usertype', 'teacher')->get();
            return view('admin.teachers.liste_teachers',['teachers' => $teachers]);
    }

//////////*******************DELETE************************///////////////// 

public function destroy($id) {
    $teacher = User::find($id);
    if (!$teacher) {
        return redirect()->back()->with('error', 'teacher not found');
    }

    if ($teacher->delete()) {
        return redirect()->back()->with('success', 'teacher deleted successfully');
    } else {
        return redirect()->back()->with('error', 'Error deleting teacher');
    }
}

        


//////////*******************ADD************************/////////////////   
public function createT()
{
        return view('admin.teachers.add_teacher');
}
public function storeT(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
    ]);


// Generate a random password
    $password = Str::random(10);
    // Create the new teacher
    $teacher = new User;
    $teacher->name = $validatedData['name'];
    $teacher->email = $validatedData['email'];
    $teacher->password = Hash::make($password);
    $teacher->usertype = 'teacher';
    $teacher->save();

    // Send email to the teacher with their login credentials
    Mail::to($teacher->email)->send(new TeacherCredentials($teacher, $password));

    return redirect()->route('listT')->with('success', 'Teacher added successfully.');
}

///////////////////////////EDIT//////////////////////////////
public function edit($id)
{
    $teacher = User::findOrFail($id);
    
    return view('admin.teachers.edit_teacher', compact('teacher'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);


    $teacher = User::findOrFail($id);
    $teacher->name = $request->input('name');
    $teacher->email = $request->input('email');
    $teacher->save();
    return redirect()->route('listT')->with('success', 'teachers updated successfully.');
}
}