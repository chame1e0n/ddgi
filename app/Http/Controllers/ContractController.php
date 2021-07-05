<?php

namespace App\Http\Controllers;

use App\Model\Contract;
use App\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContractController extends Controller
{
    /**
     * Display a list of all contracts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->has('filter') ? $request['filter'] : [];

        $filter = array_filter($data, function ($value) { return !is_null($value) && $value !== ''; });

        $query = Contract::select('contracts.*')
            ->crossJoin('specifications', 'contracts.specification_id', '=', 'specifications.id')
            ->crossJoin('types', 'specifications.type_id', '=', 'types.id')
            ->leftJoin('policies', 'contracts.id', '=', 'policies.contract_id')
            ->leftJoin('policy_flows', 'policies.id', '=', 'policy_flows.policy_id')
            ->leftJoin('employees', 'policy_flows.to_employee_id', '=', 'employees.id');

        if (isset($filter['types.name'])) {
            $query->where('types.name', 'like', '%' . $filter['types.name'] . '%');
        }
        if (isset($filter['contracts.number'])) {
            $query->where('contracts.number', 'like', '%' . $filter['contracts.number'] . '%');
        }
        if (isset($filter['policies.name'])) {
            $query->where('policies.name', '=', $filter['policies.name']);
        }
        if (isset($filter['policies.series'])) {
            $query->where('policies.series', '=', $filter['policies.series']);
        }
        if (isset($filter['employees.name'])) {
            $query->where('employees.role', '=', \App\Model\Employee::ROLE_AGENT);

            $query->where(function($query) use ($filter) {
                $query->orWhere('employees.name', 'like', '%' . $filter['employees.name'] . '%')
                      ->orWhere('employees.surname', 'like', '%' . $filter['employees.name'] . '%')
                      ->orWhere('employees.middlename', 'like', '%' . $filter['employees.name'] . '%');
            });
        }

        return view('contract.index', [
            'contracts' => $query->get(),
        ]);
    }

    /**
     * Show a form to create a new contract.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('neshchastka_borrower.create');
    }

    /**
     * Store a new contracts.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {

    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {

    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {

    }

    /**
     * Destroy an existing contract.
     * 
     * @param \App\Model\Contract $contract
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $contract)
    {

    }
}
