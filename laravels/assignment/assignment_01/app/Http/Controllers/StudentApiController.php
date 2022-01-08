<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Major;
use Illuminate\Support\Facades\DB;
/**
 * This is student controller.
 * This handles Post CRUD processing.
 */
class StudentApiController extends Controller
{
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'course' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $student = new Student;
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->major_id = $request->input('major_name');
            $student->course = $request->input('course');
            $student->save();
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
        $student = Student::find($id);
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'course' => 'required',
            'email' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $student = Student::find($id);
            if ($student) {
                $student->name = $request->input('name');
                $student->email = $request->input('email');
                $student->major_id = $request->input('major_name');
                $student->course = $request->input('course');
                $student->update();
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
    }

    /**
     * To check post delete form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post store confirm
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
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
