<?php

namespace App\Contracts\Services;

use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface StudentServiceInterface
{
    /**
     * To save getStudentList()
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function getStudentList();

    /**
     * To save
     * @param string $id post id
     * @return Object $post post object
     */
    public function saveStudent(Request $request);

    /**
     * To edit
     * @param string $id post id
     * @return Object $post post object
     */
    public function editStudent($id);

    /**
     * To update
     * @param string $id post id
     * @return Object $post post object
     */
    public function updateStudent(Request $request, $id);

    /**
     * To get delete
     * @param string $id post id
     * @return Object $post post object
     */
    public function deleteStudent($id);
}
