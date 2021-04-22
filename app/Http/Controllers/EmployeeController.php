<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Branch;
use App\Models\Spravochniki\Manager;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\MagicConst\Dir;

class EmployeeController extends Controller
{
    public function getBranchAgentManagers(Request $request)
    {
        $branch = Branch::find($request->branch_id);

        $agents = $this->setEmployeeGroupName($branch->agents, 'Агенты');
        $managers = $this->setEmployeeGroupName($branch->managers, 'Менеджеры');

        return $agents->merge($managers)->toJson();
    }

    public function getBranchEmployees(Request $request)
    {
        $branch = Branch::find($request->branch_id);

        $agents = $this->setEmployeeGroupName($branch->agents, 'Агенты');
        $managers = $this->setEmployeeGroupName($branch->managers, 'Менеджеры');
        $director = $this->setEmployeeGroupName([$branch->director->toArray()], 'Директор');

        return $agents->merge($managers)->merge($director)->toJson();
    }

    public function getEmployees() {
        $agents = Agent::all();
        $managers = Manager::all();
        $directors = Director::with('branchUsers')->get();

        $agents = $this->setEmployeeGroupName($agents, 'Агенты');
        $managers = $this->setEmployeeGroupName($managers, 'Менеджеры');
        $directors = $this->setEmployeeGroupName($directors, 'Директоры');
        $adminUser =  User::find(3);
        $admin = $this->setEmployeeGroupName([['user_id' => $adminUser->id, 'name' =>  $adminUser->name]], 'Администратор');

        return $agents->merge($managers)->merge($directors)->merge($admin)->toJson();
    }

    private function setEmployeeGroupName($collection, $groupName)
    {
        $collection = collect([['name' => $groupName, 'user_id' => 0]])->merge($collection);

        return $collection;
    }
}
