<?php

namespace App\Contracts\Services\Auth;

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Interface for task service
 */
interface AuthServiceInterface
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
