<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Major;
use Illuminate\Support\Facades\DB;
use App\Contracts\Services\StudentServiceInterface;
use App\Http\Requests\StoreStudentRequest;

/**
 * This is student controller.
 * This handles Post CRUD processing.
 */
class StudentApiController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('studentApi');
    }

    /**
     * To check post fetchstudent form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post store confirm
     */
    public function fetchstudent()
    {
        $student = DB::table('students')
            ->join('majors', 'students.major_id', '=', 'majors.id')
            ->whereNull('students.deleted_at')
            ->select('students.*', 'majors.major_name')
            ->get();
        $major = Major::all();
        return response()->json([
            'student' => $student,
            'major' => $major
        ]);
    }


    /**
     * To check post store form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post store confirm
     */
    public function store(StoreStudentRequest $request)
    {
        $student = $this->studentInterface->saveStudent($request);
            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Student Added Successfully.'
                ]);
        }
    }


    /**
     * To check post edit form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post store confirm
     */
    public function edit($id)
    {
        $student = $this->studentInterface->editStudent($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }
    }


    /**
     * To check post  form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post store confirm
     */
    public function update(StoreStudentRequest $request, $id)
    {
        $student = $this->studentInterface->updateStudent($request, $id);
            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Student Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Student Found.'
                ]);
        }
    }

    /**
     * To check post delete form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post store confirm
     */
    public function destroy($id)
    {
        $student = $this->studentInterface->deleteStudent($id);
       if ($student) {
            return response()->json([
                'status' => 200,
                'message' => 'Student Deleted Successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }
    }
}
