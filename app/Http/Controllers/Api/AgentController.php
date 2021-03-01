<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Branch;
use Illuminate\Http\Request;

class AgentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->branch_id) && !empty($request->branch_id)) {
            $agents = Branch::find($request->branch_id)->agents;

            return $this->sendResponse($agents, 'Agents retrieved successfully.');
        }

        return $this->sendError('Branch id does not exist.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $agent = Agent::find($id);

        if (is_null($agent)) {
            return $this->sendError('Agent not found.');
        }

        return $this->sendResponse($agent, 'Agent retrieved successfully.');
    }
}
