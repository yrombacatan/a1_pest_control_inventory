<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
// use App\Repositories\DepartmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Hash;
use DB;
use App\Models\Department;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends AppBaseController
{
    /** @var $userRepository UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$department = Department::all();

        $users = $this->userRepository->all();

        $departments = DB::table('users')->select(
                'department.*')
            ->join('department', 'department.id', '=', 'users.dept')
            ->select('department.name as department')
            ->get();

        return view('users.index', compact($departments))
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $departments = DB::table('department')
            ->where('department.is_active','=', 1)
            ->whereNull('deleted_at')
            ->select(DB::raw('name, id'));

        $role = DB::table('roles')
            ->select(DB::raw('name, id'));


        $departmentOptions = array('' => 'Select Department') + $departments->pluck('name', 'id')->toArray();
        $roleOptions = array('' => 'Select User Role') + $role->pluck('name', 'id')->toArray();

        return view('users.create', compact('departmentOptions','roleOptions'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = $this->userRepository->create($input);

        $roles = $request['role']; //Retrieving the roles field
        // $user->assignRole($roles);



        // Start: roles & permission
        $roles = $request['role']; //Retreive all roles
        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        $user->assignRole($roles);

        //Role Name
        $role_name = DB::table('roles')->where('roles.id', '=', $roles)->select('name')->first();
        //dd($role_name);

        //Permissions based from role
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$roles)
            ->get();
        //dd($rolePermissions);

        //Direct permission based from role
        $user->givePermissionTo($rolePermissions->pluck('name')->toArray());
        $user->syncPermissions($rolePermissions->pluck('name')->toArray());

        // End: roles & permission



        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // $permissionNames = $id->getPermissionNames();
        // dd($permissionNames);

        $departments = DB::table('department')
            ->where('department.is_active','=', 1)
            ->select(DB::raw('name, id'));

        $role = DB::table('roles')
            ->select(DB::raw('name, id'));


        $departmentOptions = array('' => 'Select Department') + $departments->pluck('name', 'id')->toArray();
        $roleOptions = array('' => 'Select User Role') + $role->pluck('name', 'id')->toArray();
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit', compact('departmentOptions','roleOptions'))
            ->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $input =  $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }


        // Start: roles & permission
        $roles = $request['role']; //Retreive all roles
        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }


        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($roles);

        //Role Name
        $role_name = DB::table('roles')->where('roles.id', '=', $roles)->select('name')->first();
        //dd($role_name);

        //Permissions based from role
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$roles)
            ->get();
        //dd($rolePermissions);

        //Direct permission based from role
        $user->givePermissionTo($rolePermissions->pluck('name')->toArray());
        $user->syncPermissions($rolePermissions->pluck('name')->toArray());

        // End: roles & permission



        $user = $this->userRepository->update($input, $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

}
