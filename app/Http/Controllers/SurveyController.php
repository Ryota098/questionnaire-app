<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;


class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function survey(Questionnaire $questionnaire)
    {
        // $questionnaire->load('questions.answers');
        
        return view('admin.questionnaire.survey', compact('questionnaire'));
    }
    
    
    public function store(Questionnaire $questionnaire, Request $request)
    {
        $data = $this->validate($request, [
            'survey.name' => 'required',
            'survey.email' => 'required|email',
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
        ]);
        
        // questionnaire(アンケート)にsurveys(子要素)を紐付け登録
        $survey = $questionnaire->surveys()->create($data['survey']);
        
        // さらにsurvey(アンケート調査)にresponses(子要素)を紐付け登録
        $survey->responses()->createMany($data['responses']);
        
        return redirect()->route('dashboard')->with('status', 'アンケート回答にご協力して頂きありがとうございます！');
    }
    
    
    public function thanks()
    {
        return view('thanks');
    }
}
