<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeacherCredentials;

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
    $teacher = new User;
    $teacher->name = $validatedData['name'];
    $teacher->email = $validatedData['email'];
    $teacher->password = Hash::make($validatedData['password']);
    $teacher->usertype = 'teacher';
    $teacher->save();

    // Send email to the teacher with their login credentials
    Mail::to($teacher->email)->send(new TeacherCredentials($teacher, $validatedData['password']));

    return redirect()->route('listT')->with('success', 'Teacher added successfully.');
}

///////////////////////////EDIT//////////////////////////////

}