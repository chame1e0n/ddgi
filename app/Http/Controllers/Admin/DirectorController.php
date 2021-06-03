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

class DirectorController extends EmployeeController
{
    protected $route = 'director';
    protected $role = Employee::ROLE_DIRECTOR;
    protected $title = 'директор';
    protected $title_multiple = 'Директора';
}
