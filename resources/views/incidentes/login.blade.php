<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestión de Emergencias UPDS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-blue-800"> UPDS</h2>
            <p class="text-gray-500 text-sm mt-1">Sistema de Emergencias Universitarias</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Correo Institucional</label>
                <input type="email" name="email" required class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500 outline-none" placeholder="ejemplo@upds.net">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Contraseña</label>
                <input type="password" name="password" required class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500 outline-none" placeholder="••••••••">
            </div>

            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition duration-200">
                Ingresar al Sistema
            </button>
        </form>
    </div>
</body>
</html>