@extends('layouts.app')

@section('content')
    <main class="sm:max-w-3xl sm:mx-auto px-2 sm:px-6">
        
        @include('layouts.alert')
        
        <div class="w-full p-6 bg-white sm:border-1 sm:rounded-sm sm:shadow-md">
            <div class="flex items-center justify-between gap-2">
                <div class="flex items-center gap-6">
                    <a href="{{ route('questionnaire.create') }}" class="flex items-center justify-center w-9 h-9 bg-gray-200 rounded-full inline-block text-xl hover:opacity-80 transition-all">
                        <i class="fas fa-angle-double-left"></i> 
                    </a> 
                    
                    <h1 class="text-xl font-bold">{{ $questionnaire->title }}</h1>
                </div>
            </div>
        </div>
        
        @foreach ($questionnaire->questions as $key => $question)
            <div class="w-full my-8 p-6 bg-white sm:border-1 sm:rounded-sm sm:shadow-md">
                
                <h1 class="font-bold text-lg">
                    {{ $key + 1 }} 、{{ $question->question }}
                </h1>
                
                <div class="mt-6 border">
                    @foreach ($question->answers as $key => $answer)
                        @if (!is_null($answer->answer))
                            <div class="flex items-center justify-between font-bold text-sm py-2 px-3 border-b last:border-none">
                                <div class="">
                                    {{ $key + 1 }} 、{{ $answer->answer }} 
                                </div>
                            
                                @if ($answer->responses->count())
                                    <div class="">
                                        {{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
                
                <div class="flex justify-between items-center gap-4 font-bold mt-6">
                    <div class="flex items-center flex-wrap gap-x-6 gap-y-2">
                        <div class="text-sm">
                            回答数： {{ $question->responses->count() }} 
                            
                        </div>
                        
                        @if ($question->responses->count())
                            <a href="{{ route('questionnaire.question.chart', [$questionnaire, $question]) }}" class="text-sm text-blue-500 hover:underline">
                                グラフを表示
                            </a>
                        @endif
                    </div>
                </div> 
            </div>
        @endforeach
    </main>
@endsection