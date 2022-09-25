<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\Answer;
use App\Models\SurveyRespons;


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
    
        // questionnaire(アンケート)にquestions(子要素)を紐付け登録
        $question = $questionnaire->questions()->create($data['question']);
        
        // さらにquestions(質問)にanswers(子要素)を紐付け登録
        $question->answers()->createMany($request['answers']);
        
        return redirect()->route('questionnaire.show', compact('questionnaire'))->with('status', '質問を追加しました！');
    }
    
    
    public function chart(Questionnaire $questionnaire, Question $question)
    {
        $responser = Answer::join('questions', 'questions.id', '=', 'answers.question_id')
            ->join('survey_responses', 'survey_responses.answer_id', '=', 'answers.id')
            ->where('questions.id', $question->id)
            ->get();
        
        $data = "";
        foreach ($question->answers as $answer) {
            $data.="['".$answer->answer."', ".$answer->responses->count()."],";
        }

        return view('admin.questionnaire.question.chart', compact('question', 'data', 'responser'));
    }
    
    
    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->delete();
        
        return redirect()->route('questionnaire.show', compact('questionnaire'))->with('status', '削除しました');
    }
}
