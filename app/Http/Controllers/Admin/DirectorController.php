<?php

namespace App\Http\Controllers\Admin;

use App\Model\Employee;

class DirectorController extends EmployeeController
{
    protected $role = Employee::ROLE_DIRECTOR;
}
