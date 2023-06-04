<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
class UserController extends Controller
{
    public UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.user.index');
    }
    public function getUsers()
    {
        return $users = $this->userRepository->getUsers();
    }
}
