<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;


class WelcomeController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);
        return view('dashboard.welcome' , compact('posts'));

    } //end of index

} //end of controller
