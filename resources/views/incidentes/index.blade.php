<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDS online - Seguimiento & Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f6f9] min-h-screen font-sans">

    <nav class="bg-[#004a87] text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6 py-3">
            <div class="flex items-center space-x-4">
                <div class="text-xs font-bold tracking-wider uppercase border-r pr-4 border-blue-400">
                    <p class="text-base"> UPDS<span class="text-blue-300 font-light">online</span></p>
                    <p class="text-[9px] font-light text-gray-300">Sistema de Gestión de Emergencias</p>
                </div>
                <div class="hidden md:flex space-x-1 text-xs font-medium pt-1">
                    <a href="{{ route('incidentes.create') }}"
                        class="px-3 py-1 text-gray-300 hover:text-white transition block">Inicio</a>
                    <a href="{{ route('dashboard.index') }}"
                        class="px-3 py-1 bg-[#003561] rounded text-white font-semibold block">Seguimiento & Registro</a>
                </div>
            </div>

            <div class="flex items-center space-x-4 text-xs">
                <div class="text-right">
                    <p class="font-semibold">{{ Auth::user()->name ?? 'Coordinador' }}</p>
                    <p class="text-[10px] text-gray-300">{{ Auth::user()->email ?? 'coordinador@upds.net' }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline m-0">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-1 bg-[#003561] hover:bg-red-700 px-3 py-1.5 rounded font-medium transition shadow-sm">
                        <span>Salir</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mx-auto my-8 max-w-6xl px-4">
        <div class="mb-6">
            <h2 class="text-2xl font-light text-gray-700">Seguimiento <span class="text-sm text-gray-400 font-normal">/
                    de materias & Registro de Incidentes</span></h2>
            <div
                class="bg-white border p-3 rounded mt-2 text-center text-sm font-semibold text-gray-600 bg-gray-50 shadow-sm uppercase tracking-wider">
                Módulo Operativo de Monitoreo General
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2.5 rounded mb-4 text-sm shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded border shadow overflow-hidden">
            <table class="w-full table-auto text-left text-sm text-gray-600">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 font-medium text-xs border-b">
                        <th class="p-3">ID</th>
                        <th class="p-3">Incidente / Tipo</th>
                        <th class="p-3">Descripción</th>
                        <th class="p-3">Fecha</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($incidentes as $incidente)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 font-bold text-gray-900">#{{ $incidente->id }}</td>
                            <td class="p-3">
                                <p class="text-gray-900 font-semibold">{{ $incidente->titulo }}</p>
                                <span
                                    class="text-[10px] bg-blue-50 text-blue-700 px-1.5 py-0.5 rounded border border-blue-200">{{ $incidente->tipo_incidente }}</span>
                            </td>
                            <td class="p-3 max-w-xs truncate">{{ $incidente->descripcion }}</td>
                            <td class="p-3 text-xs">{{ $incidente->created_at->format('d/m/Y H:i') }}</td>
                            <td class="p-3">
                                @if($incidente->estado == 'Pendiente')
                                    <span
                                        class="bg-red-50 text-red-700 border border-red-200 px-2 py-0.5 rounded text-xs font-semibold">Pendiente</span>
                                @elseif($incidente->estado == 'En proceso')
                                    <span
                                        class="bg-yellow-50 text-yellow-700 border border-yellow-200 px-2 py-0.5 rounded text-xs font-semibold">En
                                        Proceso</span>
                                @else
                                    <span
                                        class="bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded text-xs font-semibold">Resuelto</span>
                                @endif
                            </td>
                            <td class="p-3">
                                <form action="{{ route('incidentes.updateEstado', $incidente->id) }}" method="POST"
                                    class="flex items-center gap-2 justify-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="responsable_asignado"
                                        value="{{ $incidente->responsable_asignado }}" placeholder="Asignar a..."
                                        class="border rounded p-1 text-xs w-28 outline-none focus:border-blue-500">
                                    <select name="estado"
                                        class="border rounded p-1 text-xs bg-white outline-none focus:border-blue-500">
                                        <option value="Pendiente" {{ $incidente->estado == 'Pendiente' ? 'selected' : '' }}>
                                            Pendiente</option>
                                        <option value="En proceso" {{ $incidente->estado == 'En proceso' ? 'selected' : '' }}>
                                            En Proceso</option>
                                        <option value="Resuelto" {{ $incidente->estado == 'Resuelto' ? 'selected' : '' }}>
                                            Resuelto</option>
                                    </select>
                                    <button type="submit"
                                        class="bg-[#004a87] hover:bg-blue-700 text-white text-xs px-2.5 py-1.5 rounded transition">Guardar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-400">No hay registros de emergencias
                                actualmente.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>