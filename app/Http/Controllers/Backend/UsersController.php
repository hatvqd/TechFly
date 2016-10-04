<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\User;

class UsersController extends Controller
{
    protected $users;

  	public function __construct(User $users)
      {
      	$this->users = $users;

      	parent::__construct();
    }

    public function index() 
    {
      	$users = $this->users->paginate(10);
      	return view('backend.users.index', compact('users'));
    }
    public function create(User $user)
   	{
     		return view('backend.users.form', compact('user'));
   	}

   	public function store(StoreUserRequest $request) 
   	{
     		$this->users->create($request->only('name', 'email', 'password'));

     		return redirect(route('backend.users.index'))->with('status', 'Create new user successful');
   	}

   	public function edit($id) 
   	{
     		$user = $this->users->findOrFail($id);
     		return view('backend.users.form', compact('user'));
   	}

   	public function update(UpdateUserRequest $request, $id) 
   	{
     		$user = $this->users->findOrFail($id);
     		$user->fill($request->only('name', 'password', 'email'))->save();
     		return redirect(route('backend.users.edit',$user->id))->with('status', 'Update new user successful');	
   	}

    public function confirm(DeleteUserRequest $request, $id) 
    {
      	$user = $this->users->findOrFail($id);
      	return view('backend.users.confirm', compact('user'));
    }

  	public function destroy(DeleteUserRequest $request, $id) 
    {
      	$user = $this->users->findOrFail($id);
      	$user->delete();
      	return redirect(route('backend.users.index'))->with('status', 'Delete user successful');
    }
}
