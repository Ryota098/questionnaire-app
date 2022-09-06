@extends('layouts.app')

@section('content')
<main class="sm:max-w-3xl sm:mx-auto mt-10 pb-20 px-2 sm:px-6">
    <div class="w-full">

        @include('layouts.alert')

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-sm sm:shadow-md">

            <form action="{{ route('questionnaire.question.store', $questionnaire) }}" method="POST" class="w-full p-6">
                @csrf
                
                <div class="flex items-center gap-6">
                    <a href="{{ route('questionnaire.show', $questionnaire) }}" class="flex items-center justify-center w-9 h-9 bg-gray-200 rounded-full inline-block text-xl hover:opacity-80 transition-all">
                        <i class="fas fa-angle-double-left"></i> 
                    </a> 
                    
                    <h1 class="text-xl font-bold">{{ $questionnaire->title }}</h1>
                </div>
                
                <div class="flex flex-col gap-2 font-bold my-6">
                    <label for="question" class="text-sm">質問したいこと</label>
                    <input type="text" name="question[question]" value="{{ old('question.question') }}" placeholder="例）会社について生徒に伝えることができたと思いますか？"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('question') border-red-500 @enderror"
                    >
                    
                    @error('question.question')
                        <p class="text-red-500 text-xs">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div>
                    <fieldset>
                        <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer1" class="text-sm">回答０１</label>
                            <input type="text" name="answers[][answer]" value="とても思う"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                        
                        <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer2" class="text-sm">回答０２</label>
                            <input type="text" name="answers[][answer]" value="やや思う"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                        
                        <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer3" class="text-sm">回答０３</label>
                            <input type="text" name="answers[][answer]" value="どちらでもない"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                        
                        <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer4" class="text-sm">回答０４</label>
                            <input type="text" name="answers[][answer]" value="あまり思わない"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                        
                        <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer5" class="text-sm">回答０５</label>
                            <input type="text" name="answers[][answer]" value="全く思わない"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                        
                         <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer6" class="text-sm">回答０６</label>
                            <input type="text" name="answers[][answer]" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                        
                         <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer7" class="text-sm">回答０７</label>
                            <input type="text" name="answers[][answer]" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                        
                        <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer8" class="text-sm">回答０８</label>
                            <input type="text" name="answers[][answer]" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                        
                        <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer9" class="text-sm">回答０９</label>
                            <input type="text" name="answers[][answer]" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                        
                        <div class="flex flex-col gap-2 font-bold mb-6">
                            <label for="answer10
                            " class="text-sm">回答１０</label>
                            <input type="text" name="answers[][answer]" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                    </fieldset>
                </div>
                
                <div class="text-right">
                    <button class="bg-blue-500 rounded-sm py-3 px-10 text-white font-bold hover:opacity-80 transition-all">
                        登録
                    </button>
                </div>
                
            </form>
            
        </section>
    </div>
    
</main>
@endsection