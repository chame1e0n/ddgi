<?php

namespace App\Http\Controllers;

use App\Models\Pretensii;
use App\Models\PretensiiOverview;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PretensiiOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pretensiis = Pretensii::latest()->paginate(5);

        return view('pretensii_overview.index',compact('pretensiis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //check if already created overview for pretensii
        $pretensii_overview = PretensiiOverview::where('user_id', Auth::id())
            ->where('pretensii_id', $id)
            ->first();

        if(isset($pretensii_overview) && !empty($pretensii_overview)) {
            return redirect()->route('pretensii_overview.edit', [ $pretensii_overview->id]);
        }

        $pretensii_overviews = PretensiiOverview::where('pretensii_id', $id)->get();
        $pretensii = Pretensii::find($id);
        return view('pretensii_overview.create', compact('pretensii', 'pretensii_overviews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'case_number' => 'required',
            'insurer' => 'required',
            'branch_id' => 'required',
            'insurance_contract' => 'required',
            'passed' => 'required',
            'comment' => 'required',
        ]);
        $request->merge([
            'user_id' => Auth::id(),
        ]);

        PretensiiOverview::create($request->all());

        // if rejected by some user
        if (!$request->passed) {
            Pretensii::where('id', $request->pretensii_id)
                ->update(['pretensii_status_id' => 2]); // declined status 2
        }

        if ($request->passed) {
           // Todo:: change back to success or in progress if none is declinig now
        }

        $overviews = PretensiiOverview::where('pretensii_id', $request->pretensii_id)
            ->get()
            ->count();

        // ToDo::change to edit pretensii
        if ($overviews == User::permission('show pretensii')->get()->count()) {
            Pretensii::where('id', $request->pretensii_id)
                ->update(['pretensii_status_id' => 3]);
        }

        return redirect()->route('pretensii_overview.index')
            ->with('success','Успешно расммотрена претензия');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PretensiiOverview  $pretensiiOverview
     * @return \Illuminate\Http\Response
     */
    public function show(PretensiiOverview $pretensiiOverview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PretensiiOverview  $pretensiiOverview
     * @return \Illuminate\Http\Response
     */
    public function edit(PretensiiOverview $pretensiiOverview)
    {
        $pretensii_overviews = PretensiiOverview::where('pretensii_id', $pretensiiOverview->pretensii_id)->get();

        return view('pretensii_overview.edit',compact('pretensiiOverview', 'pretensii_overviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PretensiiOverview  $pretensiiOverview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PretensiiOverview $pretensiiOverview)
    {
        // ToDo::change to update pretensii (status update)
        $pretensiiOverview->update($request->all());

        return redirect()->route('pretensii_overview.index')
            ->with('success', sprintf('Дынные о претензии с номером документа\'%s\' были успешно обновлены', $pretensiiOverview->pretensii->case_number));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PretensiiOverview  $pretensiiOverview
     * @return \Illuminate\Http\Response
     */
    public function destroy(PretensiiOverview $pretensiiOverview)
    {
        //
    }
}
