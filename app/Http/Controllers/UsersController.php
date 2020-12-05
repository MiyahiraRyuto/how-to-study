<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
        public function show($id)
    {
        $user = User::findOrFail($id);
        
        $posts = $user->favorites()->paginate(8);

        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }


}
