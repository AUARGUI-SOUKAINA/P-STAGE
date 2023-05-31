<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Timetable;
use PDF;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDFS()
    {
        $students = User::where('usertype', 'student')->get();
  
        $data = [
            'title' => 'LIST STUDENTS',
            'date' => date('m/d/Y'),
            'students' => $students
        ]; 
            
        $pdf = PDF::loadView('Pdf.myPDFS', $data);
     
        return $pdf->download('students.pdf');
    }
    public function generatePDFT()
    {
        $teachers = User::where('usertype', 'teacher')->get();
  
        $data = [
            'title' => 'LIST TEACHERS',
            'date' => date('m/d/Y'),
            'teachers' => $teachers
        ]; 
            
        $pdf = PDF::loadView('Pdf.myPDFT', $data);
     
        return $pdf->download('teachers.pdf');
    }

    public function generatePDF($groupId)
    {
        $students = User::where('group_id', $groupId)->get();
        $group = Group::findOrFail($groupId);

        $data = [
            'title' => $group->name . ' Students',
            'students' => $students,
            'date' => date('m/d/Y'),
        ];

        $pdf = PDF::loadView('Pdf.groupstudentsPDF', $data);
        return $pdf->download('group.students.pdf');
}
   
public function generatePDFTimeT($groupId)
{
    $group = Group::findOrFail($groupId);
    $timetables = $group->timetables;

    $data = [
        'title' => $group->name . ' Timetable',
        'timetables' => $timetables,
        'date' => date('m/d/Y'),
        'group' => $group, // Add this line to pass the $group variable to the view
    ];

    $pdf = PDF::loadView('Pdf.timetablepdf', $data);
    return $pdf->download('timetable.pdf');
}

        


}