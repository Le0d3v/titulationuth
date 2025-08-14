<div class="relative w-full bg-gray-200 rounded-full h-6 overflow-hidden">
    <!-- Barra de progreso -->
    <div 
        class="bg-green-500 h-6 transition-all duration-500 ease-out" 
        style="width: {{ $percentage }}%">
    </div>

    <!-- Texto centrado -->
    <span class="absolute inset-0 flex items-center justify-center text-xs font-medium text-gray-800 text-white font-bold">
        {{ $percentage }}%
    </span>
</div>
