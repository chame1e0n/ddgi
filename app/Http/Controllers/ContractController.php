<?php

namespace App\Http\Controllers;

use App\Model\Contract;
use App\Model\Employee;
use App\Model\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return redirect()->route('neshchastka_borrower.create');
    }

    /**
     * Store a new contracts.
     *
     * @param \Illuminate\Http\Request $request
     * @throw \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function store(Request $request)
    {
        throw new AccessDeniedHttpException('Access is forbidden!');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $contract
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Contract $contract)
    {
        return redirect()
            ->route(Specification::$specification_key_to_routes[$contract->specification->key] . '.show', $contract->id);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $contract
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Contract $contract)
    {
        return redirect()
            ->route(Specification::$specification_key_to_routes[$contract->specification->key] . '.edit', $contract->id);
    }

    /**
     * Update an existing contract.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Contract      $contract
     * @throw \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function update(Request $request, Contract $contract)
    {
        throw new AccessDeniedHttpException('Access is forbidden!');
    }

    /**
     * Destroy an existing contract.
     * 
     * @param  \App\Model\Contract $contract
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $contract)
    {
        $route_name = Specification::$specification_key_to_routes[$contract->specification->key] . '.destroy';
        $route = Route::getRoutes()->getByName($route_name);

        return app()->call($route->getActionName(), ['neshchastka_borrower' => $contract]);
    }
}
