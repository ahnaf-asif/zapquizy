<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function options(){
        return $this->hasMany(Option::class);
    }
    public function question_bank(){
        return $this->belongsTo(QuestionBank::class);
    }
    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
}
