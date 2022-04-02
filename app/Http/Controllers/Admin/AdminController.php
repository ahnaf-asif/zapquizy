<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Level;
use App\Models\Subject;
use App\Models\QuestionBank;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.admin');
    }
    public function model_tests(){
        return view('Admin.model-tests');
    }
    public function question_banks(){
        $question_banks = QuestionBank::orderBy('id')->get();
        $data = [
            'question_banks' => $question_banks
        ];
        return view('Admin.question-banks', $data);
    }
    public function new_question_bank(){
        $levels = Level::all();
        $subjects = Subject::all();
        $data = [
            'levels' => $levels,
            'subjects' => $subjects
        ];
        return view('Admin.new-question-bank', $data);
    }
    public function new_question_bank_add(Request $req){
        $prev_bank = QuestionBank::where('name', $req->name)->where('level',$req->level)->where('subject', $req->subject)->first();
        if($prev_bank){
            return redirect()->route('admin.new.question.bank')->with('error', 'Question bank already exists');
        }

        $bank = new QuestionBank;

        $bank->name = $req->name;
        $bank->subject = $req->subject;
        $bank->level = $req->level;
        $bank->save();

        return redirect()->route('admin.question.banks')->with('success', 'Successfully created the Question Bank');
    }
    public function delete_question_bank($id){
        $bank = QuestionBank::find($id);
        $bank->delete();
        return redirect()->route('admin.question.banks')->with('success', 'Successfully Deleted a Question Bank');
    }
    public function visit_question_bank($id){
        $bank = QuestionBank::find($id);
        // return $bank;
        $levels = Level::all();
        $subjects = Subject::all();
        $chapters = $bank->chapters;
        // $questions = $bank->questions;
        $data = [
            'bank' => $bank,
            'levels' => $levels,
            'subjects' => $subjects,
            'chapters' => $chapters
        ];
        return view('Admin.visit-question-bank', $data);
    }
}
