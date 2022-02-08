<?php

namespace Modules\MasterRole\Http\Controllers;

use App\Models\Permission;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Modules\MasterPage\Entities\MasterPage;

class MasterRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Role::fetch($request);
        return view('masterrole::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d = new Role;
        $page = MasterPage::UsePage();
        $permission = Permission::get();
        return view('masterrole::form', compact('d', 'page', 'permission'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request['display_name'] = ucfirst($request->name);
        Role::create($request->only('name','display_name'));
        $role = Role::FindByName($request->name);
        foreach($request->permission as $p)
        {            
            $permission = Permission::find($p);
            $role->attachPermission($permission->name);
        }
        return redirect('masterrole')->with(['success'=> '`'.$request->name.'` Berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('masterrole::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Role $masterrole)
    {
        $d = $masterrole;
        $page = MasterPage::UsePage();
        $permission = Permission::get();
        return view('masterrole::form', compact('d', 'page', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Role $masterrole)
    {

        DB::table('permission_role')->where('role_id', $masterrole->id)->delete();
        foreach ($masterrole->users as $userid) {
            DB::table('permission_user')->where('user_id', $userid->id)->delete();
        }

        $listPermission = $request->only(['permission']);
        if (count($listPermission) > 0) {
            foreach ($listPermission['permission'] as $lp) {
                $permission = Permission::find($lp);
                $masterrole->attachPermission($permission->name);

                foreach ($masterrole->users as $userid) {
                    $permission = Permission::find($lp);
                    $user = User::find($userid->id);
                    $user->attachPermission($permission->name);
                }
                
            }
          
        }
        return redirect('masterrole')->with(['success'=> '`'.$masterrole->name.'` Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //

        return redirect('masterrole');
    }
}
