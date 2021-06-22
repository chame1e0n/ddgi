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

        return view('admin.employee.form', [
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
        $request->validate(array_merge(Employee::$validate, User::$validate));

        $user = new User();
        $user->name = $request['employee.name'];
        $user->email = $request['user.email'];
        $user->password = Hash::make($request['user.password']);
        $user->save();

        $employee = new Employee();
        $employee->fill($request['employee']);
        $employee->role = $this->role;
        $employee->user_id = $user->id;
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
        $request->validate(array_merge(Employee::$validate));

        $employee = Employee::find($id);

        $user = $employee->user;
        $user->name = $request['employee.name'];
        $user->email = $request['user.email'] ?? $user->email;
        $user->password = $request['user.password'] ? Hash::make($request['user.password']) : $user->password;
        $user->save();

        $employee->fill($request['employee']);
        $employee->save();

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
