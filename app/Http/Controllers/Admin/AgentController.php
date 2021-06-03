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

class AgentController extends EmployeeController
{
    protected $route = 'agent';
    protected $role = Employee::ROLE_AGENT;
    protected $title = 'агент';
    protected $title_multiple = 'Агенты';
}
