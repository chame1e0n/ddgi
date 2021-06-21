<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Branch;
use App\Model\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    protected $role;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Employee::$roles[$this->role];
        $first_char = mb_substr($role, 0, 1);
        $last_chars = mb_substr($role, 1, null);

        return view('admin.layouts.index-layout', [
            'objects' => Employee::where('role', $this->role)->get(),
            'title' => mb_strtoupper($first_char) . $last_chars . 'ы',
            'fields' => [
                'name' => 'Имя',
                'branch_id' => [
                    'title' => 'Филиал',
                    'type' => 'select',
                    'list' => Branch::select('id', 'name')->get()->pluck('name', 'id'),
                ],
            ],
            'route' => $this->role,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();
        $employee->user = new User();

        return view('admin.common.create', [
            'object' => $employee,
            'title' => Employee::$roles[$this->role],
            'form_path' => 'admin.employee.form',
            'route' => $this->role,
            'branches' => Branch::select('id', 'name')->get()->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $user = new User();

        $this->saveObject($employee, $user);

        return redirect()->route($this->role . '.index')
            ->with('success', 'Успешно добавлен новый ' . Employee::$roles[$this->role]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Employee $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.common.edit', [
                'object' => $employee,
                'form_path' => 'admin.employee.form',
                'route' => $this->role,
                'branches' => Branch::select('id', 'name')->get()->pluck('name', 'id'),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->saveObject($employee, $employee->user);

        return redirect()->route($this->role . '.index')
            ->with('success', sprintf('Дынные о ' . Employee::$roles[$this->role] . 'е \'%s\' были успешно обновлены', $employee->name));
    }

    protected function saveObject($employee, $user) {
        $validate = empty($user->id) ? array_merge(Employee::$validate, User::$validate) : Employee::$validate;
        request()->validate($validate);

        $user->email = request('user.email');
        if (request('user.password')) {
            $user->password = Hash::make(request('user.password'));
        }
        $user->save();

        $employee->fill(request('employee'));
        $employee->role = $this->role;
        $employee->user_id = $user->id;

        $employee->save();
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route($this->role . '.index')
            ->with('success', sprintf('Дынные о ' . Employee::$roles[$this->role] . 'е \'%s\' были успешно удалены', $employee->name));
    }
}
