<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Contracts\Services\StudentServiceInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\Major;

/**
 * This is student controller.
 * This handles Post CRUD processing.
 */
class StudentController extends Controller
{
    /**
     * student interface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }
    public function index()
    {
        $student = $this->studentInterface->getStudentList();
        return view('student.index', compact('student'));
    }

    public function create()
    {

        $data = Major::all();
        return view('student.create', [
            'majors' => $data
        ]);
    }

    /**
     * To check post store form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post store confirm
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'major_id' => 'required',
            'course' => 'required',
            'profile_image' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
            
        }
        $student = $this->studentInterface->saveStudent($request);
        if ($student) {
            return redirect('/')->with('status', 'Student and Image Added Successfully');
        }
    }

    /**
     * To check post edit form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post edit confirm
     */
    public function edit($id)
    {
        $data = Major::all();
        $student = $this->studentInterface->editStudent($id);
        return view('student.edit', [
            'student' => $student,
            'majors' => $data,
        ]);
    }

    /**
     * To check post update form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post update confirm
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'major_id' => 'required',
            'course' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $student = $this->studentInterface->updateStudent($request, $id);
        if ($student) {
            return redirect('/')->with('status', 'Student and Image Updated Successfully');
        }
    }

    /**
     * To check post create form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post create confirm
     */
    public function destroy($id)
    {
        $student = $this->studentInterface->deleteStudent($id);
        if ($student) {
            return redirect()->back()->with('status', 'Student and Image Deleted Successfully');
        }
    }
}
