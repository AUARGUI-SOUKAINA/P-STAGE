<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use Hash;
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
'password' => 'required|confirmed',
]);

// Create the new teacher
$student = new User;
$student->name = $validatedData['name'];
$student->email = $validatedData['email'];
$student->password = Hash::make($validatedData['password']);
$student->usertype = 'teacher';
$student->save();

// Redirect back to the teachers index page
return redirect()->route('listT')->with('success', 'teacher added successfully.');
}

///////////////////////////EDIT//////////////////////////////
public function edit($id)
{
    $teacher = User::findOrFail($id);
    
    return view('admin.teachers.teacher', compact('teacher'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);


    $student = User::findOrFail($id);
    $student->name = $request->input('name');
    $student->email = $request->input('email');
    $student->save();
    return redirect()->route('listT')->with('success', 'teachers updated successfully.');
}
}