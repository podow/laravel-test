<?php

namespace App\Http\Controllers;

use App\Models\UserOption;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Отображение ответов сгруппированных по дате
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = UserOption::all()->load([
            'user',
            'question',
            'option'
        ])->groupBy('created_at');

        return view('home', [
            'data' => $data
        ]);
    }
}
