<?php

namespace App\Http\Controllers;

use App\Model\Contract;
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

        $contracts = Contract::select('contracts.*')
//            ->crossJoin('policies', 'contracts.id', '=', 'policies.contract_id')
//            ->where($filter)
            ->get();

        return view('contract.index', compact('contracts'));
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
