<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\QuestionBank;
use App\Models\Question;
use App\Models\Option;
use App\Models\Chapter;

class AdminApi extends Controller
{
    public function save_question_bank(Request $req){
        
        $question_bank = QuestionBank::find($req->id);
        
        $question_bank -> name = $req -> name;
        $question_bank -> subject = $req -> subject;
        $question_bank -> level = $req -> level;
        $question_bank -> save();

        return response()->json($question_bank, 200);
    }
    public function add_chapter_to_question_bank($id, Request $chapter){
        // return 'hello world';
        // return $chapter -> name;
        $new_chapter = new Chapter;
        $new_chapter -> name = $chapter->name;
        $new_chapter -> question_bank_id = $id;
        $new_chapter -> save();

        // return 'hi';

        $qb = QuestionBank::find($id);
        $chapters = $qb -> chapters;

        return response()->json($chapters, 200);
    }
    public function add_question_to_chapter($question_bank_id, $chapter_id, Request $question){

        // return $question;
        
        $new_ques = new Question;
        $new_ques -> name = $question -> name;
        $new_ques -> question_bank_id = $question_bank_id;
        $new_ques -> chapter_id = $chapter_id;

        $new_ques -> save();

        // return $question->options[0]['name'];

        foreach($question->options as $option){
            $new_op = new Option;
            $new_op -> name = $option['name'];
            $new_op -> correct = $option['correct'];
            $new_op -> question_id = $new_ques -> id;

            $new_op -> save();
            // return $option['correct'];
        }
        // return $new_ques;
        $questions = Question::orderBy('id', 'desc')->with('options')->where('chapter_id', $chapter_id)->get();
        return response()->json($questions, 200);
    }
    public function get_questions($question_bank_id, $chapter_id){
        $questions = Question::orderBy('id', 'desc')->with('options')->where('chapter_id', $chapter_id)->get();
        return response()->json($questions, 200);
    }
    public function remove_chapter($question_bank_id, $chapter_id){
        $chapter = Chapter::find($chapter_id);
        $chapter -> delete();

        $qb = QuestionBank::find($question_bank_id);
        $chapters = $qb -> chapters;
        return response()->json($chapters, 200);
    }
    public function remove_question($chapter_id, $id){
        $ques = Question::find($id);
        $ques -> delete();

        $questions = Question::orderBy('id', 'desc')->with('options')->where('chapter_id', $chapter_id)->get();
        return response()->json($questions, 200);
    }
}
