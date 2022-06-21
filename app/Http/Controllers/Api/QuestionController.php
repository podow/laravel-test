<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Question::all()->load('options')
        ], Response::HTTP_OK);
    }
}
