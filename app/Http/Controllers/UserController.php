<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereRelation('Role', 'Title', 'Intern')->paginate(10);
        // dd($users);
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $roles = Role::get();
        $departments = Department::get();
        return view('user.create', ['users' => $users, 'roles' => $roles, 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {


        $request->validated();
        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt("nice"),
            'birthday' => $request->birthday,
            'contact' => $request->contact,
            'address' => $request->address,
            'photo' => $this->storeImage($request),    //$request->photo;
            'department_id' => $request->department_id,
            'role_id' => $request->role_id,
            'contract_status' => $request->contract_status,
            'contract_start_date' => $request->contract_start_date,
            'contract_end_date' => $request->contract_end_date,
            'hourly_rate' => $request->hourly_rate,
            'pan_number' => Crypt::encryptString($request->pan_number),
            'bank_name' => $request->bank_name,
            'bank_account' => Crypt::encryptString($request->bank_account),

        ]);


        // Password::sendResetLink($request->only(['email']));

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.edit', ['users' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::get();
        $departments = Department::get();
        return view('user.edit', ['users' => User::findOrFail($id), 'roles' => $roles, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        $request->validated();
        User::where('id', $id)->update(
            $request->except(['_token', '_method'])
        );

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('users.index'));
    }

    public function profile()
    {
        return view('user.profile');
    }

    private function storeImage($request)
    {
        $newImageName = uniqid() . '.' . $request->photo->extension();

        return $request->photo->store('userImages', 'public', $newImageName);
    }
}
