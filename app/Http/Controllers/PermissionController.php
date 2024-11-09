<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('permissions.list', compact('permissions'));
        // return view('permissions.list',[
        //     'permissions' => $permissions
        // ]);
    }
    public function create()
    {
        // $this->authorize('Permission_create');
        return view('permissions.create');
    }
    public function edit()
    {

    }
    public function store()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
}
