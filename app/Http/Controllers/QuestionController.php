<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Questionnaire;
use App\Models\Question;


class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
     public function create(Questionnaire $questionnaire)
    {
        return view('admin.questionnaire.question.create', compact('questionnaire'));
    }
    
    
    public function store(Questionnaire $questionnaire, Request $request)
    {
        $data = $this->validate($request, [
            'question.question' => 'required',
        ]);
    
        // questionnaire(アンケート)にquestions(子要素)を紐付け
        $question = $questionnaire->questions()->create($data['question']);
        
        // さらにquestions(質問)にanswers(子要素)を紐付け
        $question->answers()->createMany($request['answers']);
        
        return redirect()->route('questionnaire.show', compact('questionnaire'))->with('status', '質問を追加しました！');
    }
    
    
    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->delete();
        
        return redirect()->route('questionnaire.show', compact('questionnaire'))->with('status', '削除しました');
    }
}
