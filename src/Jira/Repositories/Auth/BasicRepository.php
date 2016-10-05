<?php
namespace Invigor\Jira\Repositories\Auth;

use Invigor\Jira\Contracts\Auth\AuthContract;
use Illuminate\Support\Facades\Config;

/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 5:54 PM
 */
class BasicRepository implements AuthContract
{

    /**
     * Generate and return token
     *
     * @return mixed
     */
    public function getToken()
    {
        /* get username and password*/
        $username = Config::get('jira.auth.username');
        $password = Config::get('jira.auth.password');

        return "Basic " . base64_encode("$username:$password");

    }
}