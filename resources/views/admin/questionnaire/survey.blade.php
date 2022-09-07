@extends('layouts.app')

@section('content')
<main class="sm:max-w-3xl sm:mx-auto px-2 sm:px-6">
    
    @include('layouts.alert')
    
    <div class="w-full p-6 bg-white sm:border-1 sm:rounded-sm sm:shadow-md">
        <div class="">
            <div class="flex items-center gap-6">
                <button type="button" onClick="history.back()" class="flex items-center justify-center w-9 h-9 bg-gray-200 rounded-full inline-block text-xl hover:opacity-80 transition-all">
                    <i class="fas fa-angle-double-left"></i> 
                </button> 
                
                <h1 class="text-xl font-bold">{{ $questionnaire->title }}</h1>
            </div>
        </div>
            
        <div class="mt-6 font-bold relative">
            <span class="absolute top-0 left-0 w-2 h-full bg-red-600"></span>
            <span class="ml-4">{{ $questionnaire->purpose }}</span>
        </div>
    </div>
    
    <form action="{{ route('survey.store', $questionnaire) }}" method="POST">
        @csrf
        
        <div class="w-full my-8 p-6 bg-white sm:border-1 sm:rounded-sm sm:shadow-md">
            <div class="flex flex-col gap-2 font-bold mb-6">
                <label for="name" class="text-sm">名前</label>
                <input type="text" id="name" name="survey[name]" placeholder="例）浦島太郎" value="{{ old('survey.name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror"
                >
                
                @error('survey.name')
                    <p class="text-red-500 text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            
            <div class="flex flex-col gap-2 font-bold">
                <label for="email" class="text-sm">メールアドレス</label>
                <input type="email" id="email" name="survey[email]" placeholder="例）abc@gmail.com" value="{{ old('survey.email') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-500 @enderror"
                >
                
                @error('survey.email')
                    <p class="text-red-500 text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        
        @foreach ($questionnaire->questions as $key => $question)

            <div class="w-full my-8 p-6 bg-white sm:border-1 sm:rounded-sm sm:shadow-md">
                
                @error ('responses.' . $key . '.answer_id')
                    <p class="text-sm text-red-600 font-bold pb-3">
                        <span class="inline-flex justify-center items-center rounded-full w-5 h-5 border border-red-600 text-red-600 mr-2">!</span>
                        {{ $message }}
                    </p>
                @enderror
                
                <div class="flex items-center justify-between gap-2">
                    <h1 class="font-bold text-lg">
                        {{ $key + 1 }} 、 {{ $question->question }}
                    </h1>
                </div>
                
                <ul class="space-y-4 mt-6">
                    @foreach ($question->answers as $answer)
                        @if (!is_null($answer->answer))
                            <li class="font-bold text-sm flex items-center gap-4">

                                <input id="{{ $answer->id }}" type="radio" value="{{ $answer->id }}"
                                    name="responses[{{ $key }}][answer_id]"
                                    {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}
                                >
                                
                                <label for="{{ $answer->id }}">
                                    {{ $answer->answer }}
                                </label>
                                
                                <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
        
        <div class="text-right">
            <button class="bg-blue-500 rounded-sm py-3 px-10 text-white font-bold hover:opacity-80 transition-all">
                送信
            </button>
        </div>
        
    </form>
    
</main>
@endsection