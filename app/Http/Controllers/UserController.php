<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Questionnaire;
use App\Models\User;
use App\Models\Survey;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    { 
        $user = Auth::user();
        
        // $questionnaires = Questionnaire::join('surveys', 'questionnaires.id', '=', 'surveys.questionnaire_id')
        //     ->where('surveys.user_id', '=', $user->id)
        //     ->get();
        
        $questionnaires = $user->questionnaires;
        
        // $questionnaires = Questionnaire::all();
        
        // dd($questionnaires->load('questions.answers'));
        
        return view('users/mypage', compact('questionnaires'));
    }
    
    
    public function show(Questionnaire $questionnaire)
    {
        $user = Auth::user();
        
        // $questionnaire = Questionnaire::join('questionnaire_user', 'questionnaires.id', '=', 'questionnaire_user.questionnaire_id')
        //     ->where('questionnaires.id', '=', $questionnaire->id)
        //     // ->where('surveys.user_id', '=', $user->id)
        //     ->select('questionnaires.*')
        //     // ->with(['questions', 'surveys'])
        //     ->first();
        
        // $questionnaire = Questionnaire::join('surveys', 'questionnaires.id', '=', 'surveys.questionnaire_id')
        //     ->where('surveys.user_id', '=', $user->id)
        //     ->where('questionnaires.id', '=', $questionnaire->id)
        //     ->select('surveys.*', 'questionnaires.*')
        //     ->first();
            
        // $questionnaire = Questionnaire::join('questionnaire_user', 'questionnaires.id', '=', 'questionnaire_user.questionnaire_id')
        //     ->where('questionnaire_user.user_id', '=', $user->id)
        //     ->where('questionnaires.id', '=', $questionnaire->id)
        //     ->select('questionnaires.*')
        //     ->first();
            
        // $survey = Survey::join('questionnaires', 'surveys.questionnaire_id', '=', 'questionnaires.id')
        //     ->where('surveys.user_id', '=', $user->id)
        //     ->where('questionnaires.id', '=', $questionnaire->id)
        //     ->select('surveys.*', 'questionnaires.*')
        //     ->first();
        
        // dd($user->responses);
        // dd($questionnaire);
        
        return view('users.show', compact('questionnaire'));
    }
}
