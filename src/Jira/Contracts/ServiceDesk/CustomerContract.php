<?php
namespace Invigor\Jira\Contracts\ServiceDesk;
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 4:42 PM
 */
interface CustomerContract
{

    /**
     * Create a new user in Jira (without password)
     * @param $email
     * @param $fullName
     * @return mixed
     */
    public function createCustomer($email, $fullName);
}