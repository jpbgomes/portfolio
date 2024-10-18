<div>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-sm mb-6"
            role="alert">
            <strong class="font-bold">Sucesso!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-sm mb-6" role="alert">
            <strong class="font-bold">Erro!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div>
        <p>CPU Temperature: {{ $cpuTemp }}°C</p>
    </div>
</div>
