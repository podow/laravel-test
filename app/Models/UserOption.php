<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'option_id',
        'text',
    ];

    public function question()
    {
        return $this->hasOne(Question::class, 'id', 'question_id');
    }

    public function option()
    {
        return $this->hasOne(Option::class, 'id', 'option_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
