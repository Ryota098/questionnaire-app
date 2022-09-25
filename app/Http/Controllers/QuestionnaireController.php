<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Questionnaire;
use App\Models\Answer;


class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function create()
    {
        $questionnaires = Questionnaire::all();
        
        return view('admin.questionnaire.create', compact('questionnaires'));
    }
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:questionnaires,title'
        ]);
        
        Questionnaire::create([
            'uuid'=>(string) Str::uuid(),
            'title' => $request->title
        ]);
        
        return redirect()->back()->with('status', '新規アンケートを作成しました！');
    }
    
    
    public function show(Questionnaire $questionnaire)
    {
        // dd($questionnaire->load('questions.answers.responses'));
        // dd($questionnaire->load('surveys.responses'));
        if (!$questionnaire->questions->count()) {
            return view('admin.questionnaire.question.create', compact('questionnaire'));
        }
        return view('admin.questionnaire.show', compact('questionnaire'));
    }
    
    
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        
        return redirect()->back()->with('status', '削除しました');
    }
}
