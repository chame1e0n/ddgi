<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AgentInfo;
use App\Model\Branch;
use App\Model\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    protected $role;

    /**
     * Display a list of all employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => Employee::where('role', $this->role)->get(),
            'title' => Employee::getTitle($this->role, true),
            'fields' => [
                'name' => 'Имя',
                'branch_id' => [
                    'title' => 'Филиал',
                    'type' => 'select',
                    'list' => Branch::select('id', 'name')->get()->pluck('name', 'id'),
                ],
            ],
            'route' => $this->role . 's',
        ]);
    }

    /**
     * Show a form to create a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();
        $employee->role = $this->role;

        $user = new User();
        $agent_info = new AgentInfo();

        return view('admin.employee.form', [
            'agent_info' => $agent_info,
            'block' => false,
            'employee' => $employee,
            'user' => $user,
        ]);
    }

    /**
     * Store a new employee.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation_rules = array_merge(Employee::$validate, User::$validate);

        if ($this->role == Employee::ROLE_AGENT) {
            $validation_rules = array_merge($validation_rules, AgentInfo::$validate);
        }

        $request->validate($validation_rules);

        if ($this->role == Employee::ROLE_AGENT) {
            $agent_info = AgentInfo::create($request['agent_info']);

            $agent_info_files = [];
            if (isset($request['files'])) {
                foreach($request['files'] as $type => $file_collection) {
                    if (in_array($type, [AgentInfo::FILE_DOCUMENT])) {
                        foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                            $agent_info_files[] = [
                                'type' => $type,
                                'original_name' => $file_item->getClientOriginalName(),
                                'path' => Storage::putFile('public/agent_info', $file_item),
                            ];
                        }
                    }
                }
            }

            $agent_info->files()->createMany($agent_info_files);
        }

        $user = new User();
        $user->name = $request['employee.name'];
        $user->email = $request['user.email'];
        $user->password = Hash::make($request['user.password']);
        $user->save();

        $employee = new Employee();
        $employee->fill($request['employee']);
        $employee->role = $this->role;
        $employee->user_id = $user->id;
        $employee->agent_info_id = isset($agent_info) ? $agent_info->id : null;
        $employee->save();

        return redirect()->route($this->role . 's.index')
                         ->with('success', 'Успешно добавлен новый ' . Employee::$roles[$this->role]);
    }

    /**
     * Display an existing employee.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('admin.employee.form', [
            'agent_info' => $employee->agent_info,
            'block' => true,
            'employee' => $employee,
            'user' => $employee->user,
        ]);
    }

    /**
     * Show a form to edit existing employee.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        return view('admin.employee.form', [
            'agent_info' => $employee->agent_info,
            'block' => false,
            'employee' => $employee,
            'user' => $employee->user,
        ]);
    }

    /**
     * Update an existing employee.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation_rules = array_merge(Employee::$validate, User::$validate);

        if ($this->role == Employee::ROLE_AGENT) {
            $validation_rules = array_merge($validation_rules, AgentInfo::$validate);
        }

        $request->validate($validation_rules);

        $employee = Employee::find($id);

        $user = $employee->user;
        $user->name = $request['employee.name'];
        $user->email = $request['user.email'] ?? $user->email;
        $user->password = $request['user.password'] ? Hash::make($request['user.password']) : $user->password;
        $user->save();

        $employee->fill($request['employee']);
        $employee->save();

        if ($this->role == Employee::ROLE_AGENT) {
            $agent_info = $employee->agent_info;
            $agent_info->fill($request['agent_info']);
            $agent_info->save();

            $agent_info_files = [];
            if (isset($request['files'])) {
                foreach($request['files'] as $type => $file_collection) {
                    if (in_array($type, [AgentInfo::FILE_DOCUMENT])) {
                        foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                            foreach($agent_info->getFiles($type) as $old_file) {
                                $old_file->delete();
                            }

                            $agent_info_files[] = [
                                'type' => $type,
                                'original_name' => $file_item->getClientOriginalName(),
                                'path' => Storage::putFile('public/agent_info', $file_item),
                            ];
                        }
                    }
                }
            }

            $agent_info->files()->createMany($agent_info_files);
        }

        return redirect()->route($this->role . 's.index')
                         ->with('success', sprintf('Данные о ' . Employee::$roles[$this->role] . 'е \'%s\' были успешно обновлены', $employee->name));
    }

    /**
     * Destroy an existing employee.
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route($this->role . 's.index')
                         ->with('success', sprintf('Данные о ' . Employee::$roles[$this->role] . 'е \'%s\' были успешно удалены', $employee->name));
    }
}
