<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Contracts\Dao\StudentDaoInterface;
use App\Contracts\Services\StudentServiceInterface;

/**
 * Service class for task.
 */
class StudentService implements StudentServiceInterface
{
    /**
     * studentdao
     */
    private $studentDao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * To get
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function getStudentList()
    {
        return $this->studentDao->getStudentList();
    }

    /**
     * To save 
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function saveStudent(Request $request)
    {
        return $this->studentDao->saveStudent($request);
    }

    /**
     * To edit
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function editStudent($id)
    {
        return $this->studentDao->editStudent($id);
    }

    /**
     * To update
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function updateStudent(Request $request, $id)
    {
        return $this->studentDao->updateStudent($request, $id);
    }

    /**
     * To delete
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function deleteStudent($id)
    {
        return $this->studentDao->deleteStudent($id);
    }

    //to getexportpdf 
    public function getexportpdf()
    {
        return $this->studentDao->getexportpdf();
    }

    //to getexportexcel 
    public function getexportexcel()
    {
        return $this->studentDao->getexportexcel();
    }

    //to getexportcsv 
    public function getexportcsv()
    {
        return $this->studentDao->getexportcsv();
    }

    //to getimportexcel 
    public function getimportexcel(Request $request)
    {
        return $this->studentDao->getimportexcel($request);
    }
}
