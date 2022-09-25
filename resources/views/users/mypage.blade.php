@extends('layouts.app')

@section('content')
    <main class="sm:max-w-2xl sm:mx-auto mt-10">
        <div class="w-full px-2 sm:px-6">
            
            @include('layouts.alert')
    
             <section class="p-6 flex flex-col break-words bg-white sm:rounded-sm sm:shadow-md">
    
                <h1 class="text-xl font-bold">マイページ</h1>
                
                @if ($questionnaires->count())
                    @foreach ($questionnaires as $questionnaire) 
                        <div class="mt-6 border border-gray-200 p-6 rounded-sm">
                            <a href="{{ route('show.questionnaire', $questionnaire) }}" class="mb-6 font-bold inline-block text-lg text-blue-500">
                                {{ $questionnaire->title }}
                            </a>
                        </div>
                    @endforeach
                @endif
            </section>
        </div>
    </main>
@endsection
