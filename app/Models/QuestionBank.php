<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    use HasFactory;
    public function questions(){
        return $this->hasMany(Question::class)->orderBy('id', 'desc');
    }
    public function chapters(){
        return $this->hasMany(Chapter::class)->orderBy('id', 'desc');
    }
}
