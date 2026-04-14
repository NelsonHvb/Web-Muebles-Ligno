<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo verificado | Muebles Ligno</title>
    
    {{-- IMPORTANTE: He activado este script para forzar que los estilos carguen sí o sí --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Puedes mantener tu vite si quieres, pero el de arriba asegura que se vea bien ahora --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

{{-- Body: Centra todo el contenido vertical y horizontalmente --}}
<body class="min-h-screen flex flex-col justify-between font-sans text-gray-900 bg-gray-50 font-medium">

    {{-- HEADER --}}
    <header class="flex-none w-full py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
             <h1 class="text-xl font-extrabold tracking-tight uppercase">
                <span class="text-gray-900">Muebles</span> <span class="text-red-600">Ligno</span>
            </h1>
        </div>
    </header>

    {{-- MAIN CONTENT: La tarjeta centrada --}}
    <main class="flex-grow flex items-center justify-center px-4">
        
        {{-- TARJETA: Ancho controlado (max-w-md), fondo blanco, limpia --}}
        <div class="w-full max-w-md bg-white rounded-xl p-8 text-center shadow-sm border border-gray-100">
            
            {{-- 1. ICONO CHECK VERDE (Tamaño controlado) --}}
            {{-- He añadido width="64" height="64" como seguro anti-gigantismo --}}
            <div class="mx-auto flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500 bg-green-100 rounded-full p-2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>

            {{-- 2. TEXTOS --}}
            <h2 class="text-xl font-bold text-gray-900 mb-2">
                ¡Cuenta Verificada!
            </h2>
            <p class="text-gray-600 text-sm leading-relaxed mb-8">
                Gracias por confirmar tu correo. Ya puedes disfrutar de todas las funcionalidades de Muebles Ligno.
            </p>

            {{-- 3. BOTONES (Anchos pero contenidos dentro de la tarjeta) --}}
            <div class="flex flex-col gap-3 px-6">
                {{-- Botón Rojo --}}
                <a href="{{ route('login') }}" 
                   class="w-full py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-colors text-center shadow-sm">
                    Iniciar sesión
                </a>
                
                {{-- Botón Blanco --}}
                <a href="{{ route('home') }}" 
                   class="w-full py-3 bg-white border-2 border-gray-200 hover:bg-gray-50 text-gray-700 font-semibold rounded-lg transition-colors text-center">
                    Volver al inicio
                </a>
            </div>

        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="flex-none py-6 text-center text-xs text-gray-500">
        <p>© {{ date('Y') }} Muebles Ligno. Todos los derechos reservados.</p>
    </footer>

</body>
</html>