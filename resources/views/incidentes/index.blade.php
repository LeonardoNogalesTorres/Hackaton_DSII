<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Control - UPDS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-gray-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">📊 Panel de Coordinación y Seguimiento</h1>
            <div class="space-x-2">
                <a href="{{ route('incidentes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-sm px-3 py-1.5 rounded font-semibold transition">Nuevo Reporte</a>
                <span class="bg-gray-700 px-3 py-1 rounded text-sm font-semibold">Rol: Coordinador</span>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="container mx-auto mt-4 max-w-6xl bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative shadow">
            {{ session('success') }}
        </div>
    @endif

    <main class="container mx-auto my-8 max-w-6xl p-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Control General de Incidentes Universitarios</h2>

        <div class="bg-white rounded-lg shadowoverflow-hidden">
            <table class="w-full table-auto text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-xs tracking-wider border-b">
                        <th class="p-4">ID</th>
                        <th class="p-4">Incidente / Tipo</th>
                        <th class="p-4">Descripción</th>
                        <th class="p-4">Fecha / Hora</th>
                        <th class="p-4">Estado Actual</th>
                        <th class="p-4 text-center">Acciones / Asignación</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600 text-sm">
                    @forelse($incidentes as $incidente)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 font-bold">#{{ $incidente->id }}</td>
                            <td class="p-4">
                                <p class="text-gray-900 font-semibold">{{ $incidente->titulo }}</p>
                                <span class="text-xs bg-gray-100 px-2 py-0.5 rounded text-gray-500 font-medium">{{ $incidente->tipo_incidente }}</span>
                            </td>
                            <td class="p-4 max-w-xs truncate">{{ $incidente->descripcion }}</td>
                            <td class="p-4 text-xs">{{ $incidente->created_at->format('d/m/Y H:i') }}</td>
                            <td class="p-4">
                                @if($incidente->estado == 'Pendiente')
                                    <span class="bg-red-100 text-red-700 font-bold px-2.5 py-1 rounded-full text-xs">🔴 Pendiente</span>
                                @elseif($incidente->estado == 'En proceso')
                                    <span class="bg-yellow-100 text-yellow-700 font-bold px-2.5 py-1 rounded-full text-xs">🟡 En proceso</span>
                                @else
                                    <span class="bg-green-100 text-green-700 font-bold px-2.5 py-1 rounded-full text-xs">🟢 Resuelto</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <form action="{{ route('incidentes.updateEstado', $incidente->id) }}" method="POST" class="flex items-center gap-2 justify-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="responsable_asignado" value="{{ $incidente->responsable_asignado }}" placeholder="Asignar a..." class="border border-gray-300 rounded p-1 text-xs w-28 focus:ring-1 focus:ring-blue-500">
                                    
                                    <select name="estado" class="border border-gray-300 rounded p-1 text-xs bg-white focus:ring-1 focus:ring-blue-500">
                                        <option value="Pendiente" {{ $incidente->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="En proceso" {{ $incidente->estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                                        <option value="Resuelto" {{ $incidente->estado == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
                                    </select>
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-2 py-1 rounded transition">💾</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-400 font-medium">No se han registrado incidentes en el sistema todavía.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>