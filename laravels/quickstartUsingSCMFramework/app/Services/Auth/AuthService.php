<?php

namespace App\Services\Auth;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;

/**
 * Service class for task.
 */
class AuthService implements AuthServiceInterface
{

    /**
     * task dao
     */
    private $authDao;

    /**
     * Class Constructor
     * @param AuthDaoInterface
     * @return
     */
    public function __construct(AuthDaoInterface $authDao)
    {
        $this->authDao = $authDao;
    }

    /**
     * To login post
     * @param Request $request request with inputs
     * @return Object  saved login
     */
    public function postAuth($request)
    {
        return $this->authDao->postAuth($request);
    }

    /**
     * To register post
     * @param Request $request request with inputs
     * @return Object  saved register
     */
    public function registerAuth($request)
    {
        return $this->authDao->registerAuth($request);
    }
}
