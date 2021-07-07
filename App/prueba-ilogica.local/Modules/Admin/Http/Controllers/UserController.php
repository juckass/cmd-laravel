<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Http\Requests\UserRequest;
use Modules\Admin\Http\Requests\UserEditRequest;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::user.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::user.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param UserRequest $request
     */
    public function store(UserRequest $request)
    {

        DB::beginTransaction();
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Exception $th) {
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();

        return redirect()->route('user');
    }

 

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user)
    {
        return view('admin::user.edit', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UserEditRequest $request)
    {
        DB::beginTransaction();
        try {
            User::where('id', $request->id)->update([
                'name' => $request->name,
                //'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Exception $th) {
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();

        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {   
        DB::beginTransaction();
        try {
            User::where('id', $request->id)->delete();
        } catch (\Exception $th) {
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();

        return "OK";    
    }


    public function datatable(Request $request)
    {
        $user = User::select(
            'id',
            'name',
            'email'
        );
        return datatables()->of($user->get())->setRowId('id')->make(true);
    }
}
