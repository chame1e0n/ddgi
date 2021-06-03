<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListHelper;
use App\Http\Controllers\Controller;
use App\Model\Branch;
use App\Model\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    protected $route = 'employee'; // Реально его не существует!
    protected $role = 0; // Такой роли нет
    protected $title = 'сотрудник';
    protected $title_multiple = 'Сотрудники';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::where('role', $this->role)
            ->get();

        return view('admin.layouts.index-layout', [
            'objects' => $employees,
            'title' => $this->title_multiple,
            'fields' => [
                'name' => 'Имя',
                'branch_id' => [
                    'title' => 'Филиал',
                    'type' => 'select',
                    'list' => ListHelper::get(Branch::class, 'name')
                ],
            ],
            'route' => $this->route
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
            'title' => $this->title,
            'form_path' => 'admin.employee.form',
            'route' => $this->route,
            'branches' => ListHelper::get(Branch::class, 'name')
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

        return redirect()->route($this->route . '.index')
            ->with('success', 'Успешно добавлен новый ' . $this->title);
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
                'route' => $this->route,
                'branches' => ListHelper::get(Branch::class, 'name')
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

        return redirect()->route($this->route . '.index')
            ->with('success', sprintf('Дынные о ' . $this->title . 'е \'%s\' были успешно обновлены', $employee->name));
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

        return redirect()->route($this->route . '.index')
            ->with('success', sprintf('Дынные о ' . $this->title . 'е \'%s\' были успешно удалены', $employee->name));
    }
}
