@extends('layouts.home')

@section('content')

<main class="container mx-auto py-8 px-6">

    <h2 class="text-2xl font-bold text-green-800 mb-4">Inscripciones a Capacitaciones</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @foreach($trainings as $training)
        <div class="bg-white shadow p-6 rounded mb-6">
            <p><strong>Título:</strong> {{ $training->title }}</p>
            <p><strong>Proveedor:</strong> {{ $training->provider }}</p>
            <p><strong>Inicio:</strong> {{ $training->start_date }}</p>
            <p><strong>Fin:</strong> {{ $training->end_date }}</p>

            <ul>
                @foreach($training->trainingUsers as $inscription)
                    <li class="mb-2">
                        <strong>ID Cesante:</strong> {{ $inscription->cesante_id }} |
                        <strong>Fecha de inscripción:</strong> {{ $inscription->fecha_inscripcion }} |
                        <strong>Completado:</strong> {{ $inscription->completado ? 'Sí' : 'No' }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach

    <a href="{{ route('training.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Volver a la lista
    </a>
</main>

@endsection
//d