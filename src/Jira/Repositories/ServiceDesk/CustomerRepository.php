<?php
namespace Invigor\Jira\Repositories\ServiceDesk;

use App\Libraries\CommonFunctions;
use Invigor\Jira\Contracts\Auth\AuthContract;
use Invigor\Jira\Contracts\Driver\DriverContract;
use Invigor\Jira\Contracts\ServiceDesk\CustomerContract;

/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 4:46 PM
 */
class CustomerRepository implements CustomerContract
{
    protected $driverRepo;
    protected $authRepo;

    public function __construct(DriverContract $driverContract, AuthContract $authContract)
    {
        $this->driverRepo = $driverContract;
        $this->authRepo = $authContract;
    }

    /**
     * Create a new user in Jira (without password)
     * @param $email
     * @param $fullName
     * @return mixed
     */
    public function createCustomer($email, $fullName)
    {
        $token = $this->authRepo->getToken();

        $this->driverRepo->setHeaders(array(
            "Authorization" => $token
        ));
    }
}