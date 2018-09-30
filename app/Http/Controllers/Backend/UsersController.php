<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;

class UsersController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate($this->limit);
        $usersCount = User::count();

        return view ("backend.user.index", compact('users','usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        return view("backend.user.create", compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {
        $user = User::create($request->all());
        $user->attachRole($request->role);

        return redirect("/backend/user")->with('message', 'A New User has been added');
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
        $user = User::findOrFail($id);

        return view("backend.user.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        $user->detachRoles();
        $user->attachRole($request->role);

        return redirect("/backend/user")->with('message', 'The User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if($deleteOption == "delete"){
            $user->posts()->withTrashed()->forceDelete();
            
        }elseif($deleteOption == "attribute"){
            $user->posts()->update(['author_id' => $selectedUser]);
        }


        $user->delete();

        return redirect("/backend/user")->with('message', 'The User has been deleted');
    }

    public function confirm(Requests\UserDestroyRequest $request, $id)
    {

        $user = User::findOrFail($id);

        $users = User::where('id', '!=', $user->id)->pluck('name','id');

        return view("backend.user.confirm", compact('user','users'));
    }
}
