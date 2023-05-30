<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Timetable;

class HomeController extends Controller
{
       public function index(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            
            if($usertype=='admin'){
                $students = \App\Models\User::where('usertype', 'student')->get();
                return view('admin.students.liste_students',compact('students'));
            }
            elseif ($usertype == 'teacher') {
                $timetables = Timetable::where('teacher_id', auth()->user()->id)->get();
                return view('admin.timetable.index', ['timetables' => $timetables]);
            }
            else if($usertype=='student'){
                $student = Auth()->user();
                $group = $student->group;
                $timetables = $group->timetables ?? [];   
                return view('admin.timetable.index',compact('student','group', 'timetables'));
            
            }
            else{
                return redirect()->back();
            }
        }
    }
}
