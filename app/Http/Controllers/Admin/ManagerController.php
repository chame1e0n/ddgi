<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListHelper;
use App\Http\Controllers\Controller;
use App\Model\Branch;
use App\Model\Employee;
use App\Model\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends EmployeeController
{
    protected $route = 'manager';
    protected $role = Employee::ROLE_MANAGER;
    protected $title = 'менеджер';
    protected $title_multiple = 'Менеджеры';
}
