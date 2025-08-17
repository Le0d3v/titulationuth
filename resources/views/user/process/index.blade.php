<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Universidad Tecnológica de Huejotzingo') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900 text-center text-3xl font-bold py-3 opacity-100">
                    {{ __("Mi Proceso") }}
                    <p class="text-center mt-1 text-gray-400 text-sm font-bold">
                        Revisa los distintos procesos en tu titulación
                    </p>
                </div>
                <div class="mt-3 px-20 flex justify-between w-full items-center gap-5">
                    <div>
                        <p class="text-sm">
                            Procesos Completados:
                            <span class="text-green-400 font-bold text-xl">
                                {{count($completed_process)}}
                            </span>
                        </p>
                    </div>
                    <div class="w-96">
                        <p class="text-center text-sm mb-1">
                            Progreso Total:
                        </p>
                        <x-progress-bar :percentage="$progress"></x-progress-bar>
                    </div>
                    <div>
                        <p class="text-sm">
                            Procesos Pendientes:
                            <span class="text-yellow-400 font-bold text-xl">
                                {{count($incompleted_process)}}
                            </span>
                        </p>
                    </div>
                </div>
                <div class="mt-2 w-full flex justify-between py-5 px-10">
                    <p class="text-gray-400 text-sm font-bold mx-auto">
                        Proceso:
                    </p>
                    <p class="text-gray-400 text-sm font-bold mx-auto">
                        Estado:
                    </p>
                    <p class="text-gray-400 text-sm font-bold mx-auto">
                        Comentarios:
                    </p>
                    <p class="text-gray-400 text-sm font-bold mx-auto">
                        Acciones:
                    </p>
                </div>
                <div class="mt-2 w-full flex justify-between py-1 px-10">
                    <p class="text-gray-400 text-sm font-bold mx-auto w-12 text-center">
                        Validación de Datos Personales
                    </p>
                    <p class="text-gray-400 text-sm font-bold mx-auto">
                        Estado:
                    </p>
                    <p class="text-gray-400 text-sm font-bold mx-auto">
                        Comentarios:
                    </p>
                    <p class="text-gray-400 text-sm font-bold mx-auto">
                        Acciones:
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
