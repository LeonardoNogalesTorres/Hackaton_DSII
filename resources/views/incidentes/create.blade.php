<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDS online - Registro de Incidentes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f6f9] min-h-screen flex flex-col justify-between font-sans">

    <nav class="bg-[#004a87] text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6 py-3">
            <div class="flex items-center space-x-4">
                <div class="text-xs font-bold tracking-wider uppercase border-r pr-4 border-blue-400">
                    <p class="text-base"> UPDS<span class="text-blue-300 font-light">online</span></p>
                    <p class="text-[9px] font-light text-gray-300">Sistema de Gestión de Emergencias</p>
                </div>
                <div class="hidden md:flex space-x-1 text-xs font-medium pt-1">
                    <a href="{{ route('incidentes.create') }}"
                        class="px-3 py-1 bg-[#003561] rounded text-white font-semibold block">Inicio</a>
                    <a href="{{ route('dashboard.index') }}"
                        class="px-3 py-1 text-gray-300 hover:text-white transition block">Seguimiento & Registro</a>
                </div>
            </div>

            <div class="flex items-center space-x-4 text-xs">
                <div class="text-right">
                    <p class="font-semibold">{{ Auth::user()->name ?? 'Operador' }}</p>
                    <p class="text-[10px] text-gray-300">{{ Auth::user()->email ?? 'operador@upds.net' }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline m-0">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-1 bg-[#003561] hover:bg-red-700 px-3 py-1.5 rounded font-medium transition shadow-sm">
                        <span>Salir</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mx-auto my-8 max-w-xl px-4 flex-grow">
        <div class="mb-4">
            <h2 class="text-2xl font-light text-gray-700">Inicio <span class="text-sm text-gray-400 font-normal">/
                    cuadro de eventos e información</span></h2>
        </div>

        <div class="bg-white rounded border-t-4 border-red-500 shadow p-6">
            <div class="flex items-center space-x-3 mb-6 border-b pb-3">
                <div class="p-2 bg-red-50 text-red-600 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Registrar Nuevo Incidente Crítico</h3>
            </div>

            <form id="formIncidente" action="{{ route('incidentes.store') }}" method="POST"
                class="space-y-4 text-sm text-gray-600">
                @csrf
                <div>
                    <label class="block font-medium mb-1">Título del Incidente</label>
                    <input type="text" id="titulo" name="titulo"
                        class="w-full border border-gray-300 p-2 rounded focus:ring-1 focus:ring-blue-500 outline-none"
                        placeholder="Ej. Corte de energía Bloque B">
                </div>

                <div>
                    <label class="block font-medium mb-1">Tipo de Incidente</label>
                    <select id="tipo_incidente" name="tipo_incidente"
                        class="w-full border border-gray-300 p-2 rounded bg-white focus:ring-1 focus:ring-blue-500 outline-none">
                        <option value="">-- Seleccione el tipo --</option>
                        <option value="Incendio">Incendio</option>
                        <option value="Corte de energía">Corte de energía</option>
                        <option value="Accidente médico">Accidente médico</option>
                        <option value="Inundación">Inundación</option>
                        <option value="Seguridad">Problema de seguridad</option>
                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-1">Descripción Detallada</label>
                    <textarea id="descripcion" name="descripcion" rows="4"
                        class="w-full border border-gray-300 p-2 rounded focus:ring-1 focus:ring-blue-500 outline-none"
                        placeholder="Describa la emergencia aquí..."></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 rounded transition duration-200 shadow-sm uppercase tracking-wider text-xs">
                    Reportar Incidente
                </button>
            </form>
        </div>
    </main>

    <footer class="bg-gray-200 text-center py-3 text-[11px] text-gray-500 border-t">
        Universidad Privada Domingo Savio — Gestión 2026
    </footer>

    <script>
        document.getElementById('formIncidente').addEventListener('submit', function (e) {
            if (!document.getElementById('titulo').value.trim() || !document.getElementById('descripcion').value.trim() || !document.getElementById('tipo_incidente').value) {
                e.preventDefault();
                alert("⚠️ Todos los campos son obligatorios.");
            }
        });
    </script>
</body>

</html>