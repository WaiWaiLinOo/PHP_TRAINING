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
    public function getStudentList()
    {
        return Student::all();
    }

    /**
     * To save 
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function saveStudent(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->major_id = $request->input('major_id');
        $student->course = $request->input('course');
        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }
        $student->save();
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
        $student->delete();
        return $student;
    }

    //to getexportpdf 
    public function getexportpdf()
    {
        $student = Student::all();
        view()->share('students', $student);
        $pdf = PDF::loadview('exportpdf');
        return $pdf->download('data.pdf');
    }

    //to getexportexcel 
    public function getexportexcel()
    {
        return Excel::download(new StudentExport, 'data.xlsx');
    }

    //to getexportcsv 
    public function getexportcsv()
    {
        return Excel::download(new StudentExport, 'data.csv');
    }

    //to getimportexcel 
    public function getimportexcel(Request $request)
    {
        $data = $request->file('file');
        $namefile = $data->getClientOriginalName();
        $data->move('StudentData', $namefile);
        Excel::import(new StudentImport, public_path('/StudentData/' . $namefile));
        return redirect()->back();
    }
}
