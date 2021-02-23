<?php

namespace App\Http\Controllers;

use App\Models\Spravochniki\Branch;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getEmployees(Request $request)
    {
        $branch = Branch::find($request->branch_id);

        $agents = $this->setEmployeeGroupName($branch->agents, 'Агенты');
        $managers = $this->setEmployeeGroupName($branch->managers, 'Менеджеры');

        return $agents->merge($managers)->toJson();
    }

    private function setEmployeeGroupName($collection, $groupName)
    {
        $collection = collect([['name' => $groupName, 'user_id' => 0]])->merge($collection);

        return $collection;
    }
}
