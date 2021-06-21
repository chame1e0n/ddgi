<?php

namespace App\Http\Controllers\Admin;

use App\Model\Employee;

class ManagerController extends EmployeeController
{
    protected $role = Employee::ROLE_MANAGER;
}
