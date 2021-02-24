<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spravochniki\Branch;
use App\Http\Resources\Branch as BranchResource;

class BranchController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::with('director')->get();

        return $this->sendResponse($branches, 'Branches retrieved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spravochniki\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::with('director')->where('id', $id)->first();

        if (is_null($branch)) {
            return $this->sendError('Branch not found.');
        }

        return $this->sendResponse($branch, 'Branch retrieved successfully.');
    }
}
