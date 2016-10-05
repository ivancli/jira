<?php
namespace Invigor\Jira;
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 4:18 PM
 */
class Jira
{
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $jira;

    /**
     * Create a new confide instance.
     *
     * @param \Illuminate\Foundation\Application $jira
     *
     */
    public function __construct($jira)
    {
        $this->jira = $jira;
    }

}