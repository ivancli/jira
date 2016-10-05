<?php
namespace Invigor\Jira\Contracts\Auth;
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 5:53 PM
 */
interface AuthContract
{
    /**
     * Generate and return token
     *
     * @return mixed
     */
    public function getToken();
}