<?php

namespace App\Http\Controllers;

use App\Models\UserOption;
use Illuminate\Support\Facades\Redis;

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
        // Обработка отказа бд
        try {
            $data = UserOption::all()->load([
                'user',
                'question',
                'option'
            ])->groupBy('created_at'); // Получаем данные из бд
            Redis::set('user:options', $data);  // Если удалось получить, сохраняем в кэш редиса
        } catch (\Illuminate\Database\QueryException $e) {
            $data = Redis::get('user:options'); // Если не удалось получить данные из бд, получаем из редиса
        }

        return view('home', [
            'data' => $data
        ]);
    }
}
