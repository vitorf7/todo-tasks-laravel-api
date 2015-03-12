<?php namespace LaravelTodo\Http\Controllers;

use LaravelTodo\Http\Requests;
use LaravelTodo\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    public function home()
    {
        return view('pages.home');
    }

}
