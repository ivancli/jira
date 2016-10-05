<?php
namespace Invigor\Jira;

use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 4:18 PM
 */
class JiraFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'jira';
    }
}