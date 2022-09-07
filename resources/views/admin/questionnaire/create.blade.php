@extends('layouts.app')

@section('content')
<main class="sm:max-w-3xl sm:mx-auto px-2 sm:px-6">
    <div class="w-full">

        @include('layouts.alert')

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-sm sm:shadow-md">

            <form action="{{ route('questionnaire.store') }}" method="POST" class="w-full p-6">
                @csrf
                
                <div class="flex items-center gap-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center justify-center w-9 h-9 bg-gray-200 rounded-full inline-block text-xl hover:opacity-80 transition-all">
                        <i class="fas fa-angle-double-left"></i> 
                    </a> 
                    
                    <h1 class="text-xl font-bold">アンケートを作成</h1>
                </div>
                
                <div class="flex flex-col gap-2 font-bold my-6">
                    <label for="title" class="text-sm">タイトル</label>
                    <input type="text" name="title" placeholder="例）従業員満足度アンケート" value="{{ old('title') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') border-red-500 @enderror"
                    >
                    
                    @error('title')
                        <p class="text-red-500 text-xs">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div class="flex flex-col gap-2 font-bold mb-6">
                    <label for="purpose" class="text-sm">アンケートの意図</label>
                    <input type="text" name="purpose" placeholder="例）従業員満足度の向上" value="{{ old('purpose') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('purpose') border-red-500 @enderror"
                    >
                    
                    @error('purpose')
                        <p class="text-red-500 text-xs">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <!--<div class="flex flex-col gap-2 font-bold mb-6">-->
                <!--    <label class="text-sm">回答タイプ</label>-->
                <!--    <div class="form-control mt-1">-->
                <!--        <label class="flex items-center gap-2 cursor-pointer">-->
                <!--            <input type="radio" name="role" value="radio" class="radio checked:bg-red-500" checked>-->
                <!--            <span class="text-sm">ラジオ</span>-->
                <!--         </label>-->
                <!--    </div>-->
                <!--    <div class="form-control">-->
                <!--        <label class="flex items-center gap-2 cursor-pointer">-->
                <!--            <input type="radio" name="role" value="check" class="radio checked:bg-blue-500">-->
                <!--            <span class="text-sm">チェックボックス</span>-->
                <!--        </label>-->
                <!--    </div>-->
                <!--    <div class="form-control">-->
                <!--        <label class="flex items-center gap-2 cursor-pointer">-->
                <!--            <input type="radio" name="role" value="check" class="radio checked:bg-blue-500">-->
                <!--            <span class="text-sm">テキストエリア</span>-->
                <!--        </label>-->
                <!--    </div>-->
                <!--</div>-->
                
                <div class="text-right">
                    <button class="bg-blue-500 rounded-sm py-3 px-10 text-white font-bold hover:opacity-80 transition-all">
                        作成
                    </button>
                </div>
                
            </form>
            
        </section>
    </div>
    
    @if ($questionnaires->count())
        <div class="w-full space-y-8 my-10 p-6 bg-white sm:border-1 sm:rounded-sm sm:shadow-md">
            @foreach ($questionnaires as $key=> $questionnaire)
                <div class="flex items-center justify-between gap-2 border border-gray-100 p-4 rounded-sm">
                    <div class="font-bold flex flex-col gap-2">
                        <a href="{{ route('questionnaire.show', $questionnaire) }}" class="text-blue-500 hover:underline">
                            {{ $key + 1 }} 、{{ $questionnaire->title }}
                        </a>
                        
                        @if (!$questionnaire->questions->count())
                            <span class="text-xs text-red-600">アンケートの質問を作成して下さい</span>
                        @endif
                    </div>
                    
                    <form action="{{ route('questionnaire.delete', $questionnaire) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button onclick="return confirm('削除してもよろしいですか？')" class="inline-block py-1 px-3 whitespace-nowrap bg-red-600 text-white font-bold text-sm rounded-sm hover:opacity-80 transition-all">
                            削除
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</main>
@endsection

