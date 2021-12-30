<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;
use App\Models\Task;

/**
 * Interface for Data Accessing Object of auth
 */
interface AuthDaoInterface
{
    /**
     * To login post
     * @param Request $request request with inputs
     * @return Object  saved login
     */
    public function postAuth($request);


    /**
     * To register post
     * @param Request $request request with inputs
     * @return Object saved register
     */
    public function registerAuth($request);
}
