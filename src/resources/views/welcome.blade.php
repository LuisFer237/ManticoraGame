@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-900 text-white relative overflow-hidden">

        <form action="{{ route('game.start') }}" method="get">
            <button type="submit"
                class="border-2 border-white text-lg font-semibold rounded-lg py-2 px-4 hover:bg-white hover:text-gray-900 transition-colors duration-300 ease-in-out">
                Empezar Juego
            </button>
        </form>

    </div>
@endsection
