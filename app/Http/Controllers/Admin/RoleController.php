<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    public RoleRepository $roleRepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $this->data['roles'] = $this->roleRepository->all();
        return view('admin.role.index', ['roles' => $this->data['roles']]);
    }

    public function show($role_id)
    {
        $id = decrypt($role_id);
        $this->data = $this->roleRepository->show($id);
        return view('admin.role.show',  $this->data);
    }

    public function savePermission(Request $request , $id)
    {
        $permissions = $request->all();
        unset($permissions['_token']);
        $permissions = array_values($permissions);

        $this->roleRepository->saveRolePermissions($request , $id);
        $notifications = array('message' => 'Data Saved Success' , 'alert-type' => 'success');
        return redirect(RouteServiceProvider::Role)->with($notifications);
    }

}
