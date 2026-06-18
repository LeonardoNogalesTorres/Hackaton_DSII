<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Emergencia - UPDS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col justify-between">

    <nav class="bg-blue-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">🚨 Sistema de Emergencias UPDS</h1>
            <span class="bg-blue-700 px-3 py-1 rounded text-sm font-semibold">Rol: Operador</span>
        </div>
    </nav>

    <main class="container mx-auto my-8 max-w-lg bg-white p-6 rounded-lg shadow-lg flex-grow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Registrar Nuevo Incidente</h2>
        
        <form id="formIncidente" action="{{ route('incidentes.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Título del Incidente *</label>
                <input type="text" id="titulo" name="titulo" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej. Corto circuito en Bloque B">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Tipo de Incidente *</label>
                <select id="tipo_incidente" name="tipo_incidente" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Seleccione una opción --</option>
                    <option value="Incendio">Incendio</option>
                    <option value="Corte de energía">Corte de energía</option>
                    <option value="Accidente médico">Accidente médico</option>
                    <option value="Inundación">Inundación</option>
                    <option value="Seguridad">Problema de seguridad</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Descripción de la Emergencia *</label>
                <textarea id="descripcion" name="descripcion" rows="4" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Detalla lo que está ocurriendo de la forma más precisa posible..."></textarea>
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-200 shadow">
                🚨 Reportar Emergencia
            </button>
        </form>
    </main>

    <script>
        document.getElementById('formIncidente').addEventListener('submit', function(e) {
            const titulo = document.getElementById('titulo').value.trim();
            const descripcion = document.getElementById('descripcion').value.trim();
            const tipo = document.getElementById('tipo_incidente').value;

            if (titulo === "" || descripcion === "" || tipo === "") {
                e.preventDefault();
                alert("⚠️ Todos los campos con asterisco (*) son completamente obligatorios.");
                return false;
            }
            
            if (titulo.length < 5) {
                e.preventDefault();
                alert("⚠️ Por favor, escribe un título más descriptivo (mínimo 5 caracteres).");
                return false;
            }
        });
    </script>
</body>
</html>