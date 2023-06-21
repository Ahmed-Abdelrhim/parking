<?php
namespace App\Repositories;

use App\Interfaces\RoleInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleInterface {

    public function all(): Collection|array
    {
        return $roles = Role::query()->get();
    }
    public function show($id)
    {
        $role = Role::query()->find($id);
        $listPermissionsArray = [];
        $permissions = Permission::query()->get();

        if (count($permissions)) {
            foreach ($permissions as $permission) {
                if ((strpos($permission->name, '_create') == false) && (strpos($permission->name, '_edit') == false) && (strpos($permission->name, '_show') == false) && (strpos($permission->name, '_delete') == false)) {
                    $listPermissionsArray[$permission->id] = $permission;
                }
                $permissionArray[$permission->name] = $permission->id;
            }
        }

        $this->data['role']            = $role;
        $this->data['permissionArray'] = $permissionArray;
        $this->data['permissions']     = $role->permissions->pluck('id' , 'id');
        $this->data['permissionList']  = $listPermissionsArray;



        return $this->data;
    }

    public function saveRolePermissions(Request $request , $id)
    {
        if ($_POST) {
            $permissions = $request->all();
            unset($permissions['_token']);

            $permissions = array_values($permissions);

            $role       = Role::query()->find($id);
            $permission = Permission::query()->whereIn('id', $permissions)->get();
            $role->syncPermissions($permission);

            return redirect(route('admin.role.show', $role))->withSuccess('The Permission Updated Successfully');
        }
    }

    public function create()
    {
        // TODO :: create a role here
    }

    public function edit()
    {
        // TODO :: edit a role here
    }

    public function destroy($id)
    {
        $role = Role::query()->find($id);
        $role->delete();
        // TODO :: delete a role here
    }
}
