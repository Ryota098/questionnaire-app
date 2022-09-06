@extends('layouts.app')

@section('content')
<main class="sm:max-w-2xl sm:mx-auto h-screen">
    <div class="w-full px-6 my-20">
        
        <div class="max-w-4xl mx-auto font-bold space-y-6">
            <div class="flex flex-col items-center">
                <i class="fas fa-check-circle text-[36px] sm:text-[46px] text-blue-500"></i>
                <h1 class="text-xl mt-4">アンケートを送信しました</h1>
            </div>
            <div class="flex flex-col items-center font-normal">
                <p class="leading-7">アンケート回答にご協力して頂きありがとうございます。</p>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="mt-4 md:w-auto px-6 py-3 whitespace-nowrap font-bold inline-block rounded-sm bg-blue-500 text-white hover:opacity-80 transition-all">トップページへ</a>
            </div>
        </div>
        
    </div>
</main>
@endsection
