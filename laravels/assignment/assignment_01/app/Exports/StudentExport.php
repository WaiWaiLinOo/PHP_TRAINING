<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class StudentExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return Student::all();
        //$student = DB::table('students')
        //->join('majors','students.major_id', '=','majors.id')
        //->whereNull('students.deleted_at')
        //->select('students.*','majors.major_name')
        //->get();
        return Student::select([
            'name',
            'email',
            'major_name',
            'course',
            'created_at',
            'updated_at'
        ])->get();
        //return $student;
    }
}
