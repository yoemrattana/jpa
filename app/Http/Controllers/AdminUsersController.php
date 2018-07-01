<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
use App\Role;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view( 'admin.user.index', compact( 'users' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck( 'name', 'id' )->all();
        return view( 'admin.user.create', compact( 'roles' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $user = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->is_active    = $request->is_active;
        $user->password     = bcrypt( $request->password );
        $user->save();

        $role = Role::find( $request->role_id );
        $user->attachRole( $role );

        Session::flash( 'message', 'New User has been create' );
        return redirect( 'users' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail( $id );
        $roles = Role::pluck( 'name', 'id' )->all();

        return view( 'admin.user.edit', compact( 'user', 'roles' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $user = User::find( $id );

        $this->validate( $request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,'.$user->id,
            'role_id'   => 'required',
        ]);

        if ( trim($request->password) == '' ) {
            $inputs = $request->except('password');
        } else {
            $this->validate($request, [
                'password' => 'confirmed|min:6'
            ]);

            $inputs = $request->all();
            $inputs['password'] = bcrypt($request->password);
        }

        $user->update( $inputs );
        //update role for user (role_user table)
        $role = Role::find( $request->role_id );
        $user->roles()->sync( $role );

        Session::flash( 'message', 'The user has been updated!' );
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail( $id );
        //$role = Role::where( 'user_id', $id );

        $user->roles()->detach('role_id');
        $user->delete();

        Session::flash( 'message', 'The User has been deleted' );
        return redirect('users');
    }
    
}
