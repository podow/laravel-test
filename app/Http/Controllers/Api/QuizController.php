<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\UserOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class QuizController extends Controller
{
    /**
     * Отдача всех вопросов с варинтами через json
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Обработка отказа бд
        try {
            $data = Question::all()->load('options'); // Получаем данные из бд
            Redis::set('quiz:questions', $data);  // Если удалось получить, сохраняем в кэш редиса
        } catch (\Illuminate\Database\QueryException $e) {
            $data = Redis::get('quiz:questions'); // Если не удалось получить данные из бд, получаем из редиса
        }

        return response()->json([
            'data' => $data
        ], Response::HTTP_OK);
    }

    /**
     * Сохранение опроса пройденного пользователем
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        try {
            foreach ($data as $item) {
                UserOption::create([
                    'user_id' => 1,
                    'question_id' => $item['questionId'],
                    'option_id' => $item['selected'],
                    'text' => $item['text'],
                ]);
            }

            return response()->json([
                'message' => 'Спасибо за прохождение опроса'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
