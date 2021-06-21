<?php

namespace App\Http\Controllers\Admin;

use App\Model\Employee;

class AgentController extends EmployeeController
{
    protected $role = Employee::ROLE_AGENT;
}
