<?php

namespace App\Http\Controllers;

use App\Helpers\Convertio\Convertio;
use App\Model\Contract;
use App\Model\Employee;
use App\Model\Specification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
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
            ->leftJoin('specifications', 'contracts.specification_id', '=', 'specifications.id')
            ->leftJoin('types', 'specifications.type_id', '=', 'types.id')
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

        $query->groupBy('contracts.id');

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
     * @param \Illuminate\Http\Request $request HTTP-request
     * @throw \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function store(Request $request)
    {
        throw new AccessDeniedHttpException('Access is forbidden!');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $contract Contract
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
     * @param  \App\Model\Contract $contract Contract
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
     * @param \Illuminate\Http\Request $request  HTTP-request
     * @param \App\Model\Contract      $contract Contract
     * @throw \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function update(Request $request, Contract $contract)
    {
        throw new AccessDeniedHttpException('Access is forbidden!');
    }

    /**
     * Destroy an existing contract.
     * 
     * @param  \App\Model\Contract $contract Contract
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $contract)
    {
        $route_name = Specification::$specification_key_to_routes[$contract->specification->key] . '.destroy';
        $route = Route::getRoutes()->getByName($route_name);
        $parameter_names = $route->parameterNames();

        return app()->call($route->getActionName(), [$parameter_names[0] => $contract]);
    }

    /**
     * Print file of the contract.
     * 
     * @param \Illuminate\Http\Request $request  HTTP-request
     * @param \App\Model\Contract      $contract Contract
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectRespons|null
     */
    public function print(Request $request, Contract $contract) {
        $key = $contract->specification->key;

        $files = glob(storage_path('prints' . DIRECTORY_SEPARATOR . $key . DIRECTORY_SEPARATOR . $request->file));

        if (count($files) != 1) {
            return back()->withErrors('Файл для распечатки не обнаружен');
        }

        $file = $files[0];
        $file_name = basename($file);
        $variables = $contract->getPrintVariables();

        $file_name_parts = explode('.', $file_name);
        $file_name_parts[count($file_name_parts) - 1] = 'pdf';
        $pdf_file_name = implode('.', $file_name_parts);

//echo '<pre>'; var_dump($file_name, $pdf_file_name, $variables->all()); exit();

        $document = new TemplateProcessor($file);

        Carbon::setLocale('ru');

        $document->setValues($variables->all());
        $document->saveAs($file_name);
//        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
//        Settings::setPdfRendererPath('.');
//        $phpWord = IOFactory::load('dogovor.docx');
//        $phpWord->setDefaultFontName('dejavu sans');

//        $xmlWriter = IOFactory::createWriter($phpWord, 'PDF');
//        $xmlWriter->save('result.pdf');

//        return response()->url('za.docx');
//        return response()->download('polis.docx');

//        $entity = AllProduct::query()->findOrFail($id);
//        $printFormProcessor = new PrintFormProcessor();
//        $templateFile = resource_path('test.docx');
//        $tempFileName = $printFormProcessor->process($templateFile, $entity);
//        $fileName = 'product3777_' . $id;
//        return response()->download($tempFileName, $fileName . '.docx')->deleteFileAfterSend();

        try {
            $api = new Convertio(config('app.convertioKey'));
            $api->start($file_name, 'pdf')->wait()->download($pdf_file_name)->delete();
//            echo "<script>window.open('".config('app.url')."/dogovor.pdf', '_blank').print()</script>";

            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename=' . $pdf_file_name);

            readfile($pdf_file_name);
        } catch (\Exception $e) {
            return redirect('/' . $file_name);
        }
    }
}
