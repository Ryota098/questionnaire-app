@extends('layouts.app')

@section('content')
<main class="sm:max-w-2xl sm:mx-auto mt-10">
    <div class="w-full px-2 sm:px-6">
        
        @include('layouts.alert')

         <section class="p-6 flex flex-col break-words bg-white sm:rounded-sm sm:shadow-md">

            <h1 class="text-xl font-bold">アンケート一覧</h1>

            @if ($questionnaires->count())
                @foreach ($questionnaires as $questionnaire) 
                    <div class="mt-6 border border-gray-200 p-6 rounded-sm">
                        <a href="{{ route('survey', $questionnaire) }}" class="mb-6 font-bold inline-block text-lg text-blue-500">
                            {{ $questionnaire->title }}
                        </a>
                        
                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-bold">アンケートURL</span>
                            <a href="{{ $questionnaire->publicPath() }}" target="_blank" rel="noopener noreferrer" class="text-sm text-blue-500 hover:underline">
                                {{ $questionnaire->publicPath() }}
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
    </div>
</main>
@endsection
