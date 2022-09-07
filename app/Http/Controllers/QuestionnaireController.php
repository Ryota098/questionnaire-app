<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $data = $this->validate($request, [
            'title' => 'required|unique:questionnaires,title',
            'purpose' => 'required',
        ]);
        
        // ログイン中のユーザーにquestionnaire(子要素)を紐付け登録
        $questionnaire = auth()->user()->questionnaires()->create($data);
        
        return redirect()->back()->with('status', '新規アンケートを作成しました！');
    }
    
    
    public function show(Questionnaire $questionnaire)
    {
        return view('admin.questionnaire.show', compact('questionnaire'));
    }
    
    
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        
        return redirect()->back()->with('status', '削除しました');
    }
}
