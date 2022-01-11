<?php

namespace App\Dao;

use App\Contracts\Dao\StudentDaoInterface;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\File;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Notifications\WelcomeEmailNotification;
use Mail;

/**
 * Data accessing object for post
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * To getstudent
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function getStudentList(Request $request)
    {
        $name = $request->input('name');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $students = DB::table('students')
                ->join('majors','students.major_id', '=','majors.id')
                ->whereNull('students.deleted_at')
                ->select('students.*','majors.major_name');
                
       if ($name) {
            $students->where('students.name', 'LIKE', '%' . $name . '%');
        }
        if ($fromDate) {
            $students->whereDate('students.created_at', '>=', $fromDate);
        }
        if ($toDate) {
            $students->whereDate('students.created_at', '<=', $toDate);
        }
        return $students->get()->except('students.deleted_at');
    }

    /**
     * To save 
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function saveStudent(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->major_id = $request->major_id;
        $student->course = $request->course;
        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }
        $student->save();
        $student->notify(new WelcomeEmailNotification($student));
        return $student;
    }

    /**
     * To edit
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function editStudent($id)
    {

        return Student::find($id);
    }

    /**
     * To update
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function updateStudent(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->major_id = $request->input('major_id');
        $student->course = $request->input('course');

        if ($request->hasfile('profile_image')) {
            $destination = 'uploads/students/' . $student->profile_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }
        $student->update();
        return $student;
    }

    /**
     * To delete
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function deleteStudent($id)
    {
        
        $student = Student::find($id);
        $destination = 'uploads/students/' . $student->profile_image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        DB::transaction(function () use($student) {
        $student->delete();
         });
        return $student;
        
    }

    
    /**
     * To upload student pdf file
     * @return File Upload pdf file
     */
    public function getExportPdf()
    {
        $student = DB::table('students')
            ->join('majors','students.major_id', '=','majors.id')
            ->get();
        view()->share('students', $student);
        $pdf = PDF::loadview('exportpdf');
        return $pdf->download('data.pdf');
    }

    
    /**
     * To upload student excel file
     * @return File Upload excel file
     */
    public function getExportExcel()
    {
        return Excel::download(new StudentExport, 'data.xlsx');
    }

    
    /**
     * To upload student csv file
     * @return File Upload CSV file
     */
    public function getExportCsv()
    {
        return Excel::download(new StudentExport, 'data.csv');
    }

    
    /**
     * To upload student excel file
     * @return File Upload excel file
     */
    public function getImportExcel(Request $request)
    {
        $data = $request->file('file');
        $namefile = $data->getClientOriginalName();
        $data->move('StudentData', $namefile);
        Excel::import(new StudentImport, public_path('/StudentData/' . $namefile));
        return redirect()->back();
    }
}
