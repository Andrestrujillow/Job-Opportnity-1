@extends('layouts.home')

@section('content')

<main class="container mx-auto py-8 px-6">

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-800">Capacitaciones Registradas</h2>

        <div class="flex space-x-2">
            <a href="{{ route('training.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Nueva Capacitación
            </a>

            <a href="{{ route('training.inscripciones') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Ver Inscripciones
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-4 py-2 text-left">Título</th>
                    <th class="px-4 py-2 text-left">Proveedor</th>
                    <th class="px-4 py-2 text-left">Inicio</th>
                    <th class="px-4 py-2 text-left">Fin</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trainings as $item)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $item->title }}</td>
                        <td class="px-4 py-2">{{ $item->provider }}</td>
                        <td class="px-4 py-2">{{ $item->start_date }}</td>
                        <td class="px-4 py-2">{{ $item->end_date }}</td>
                        <td class="px-4 py-2 flex space-x-2 items-center">
                            <a href="{{ route('training.edit', $item->id) }}" class="text-blue-600 hover:underline">Editar</a>

                            <form action="{{ route('training.destroy', $item->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar esta capacitación?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">No hay capacitaciones registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

@endsection
