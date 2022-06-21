<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\UserOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizController extends Controller
{
    /**
     * Отдача всех вопросов с варинтами через json
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => Question::all()->load('options')
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
