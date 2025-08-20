<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Universidad Tecnológica de Huejotzingo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-3 text-gray-900 w-full text-center font-bold text-3xl">
                    {{ __("Procesos de Titulación") }}
                </div>

                <div class="w-full flex justify-center items-center p-5 mt-1">
                    <div class="w-full p-3 shadow-md">
                        <h2 class="text-center font-bold text-green-400 text-2xl">
                            TSU
                        </h2>
                        <p class="text-sm text-gray-400">
                            Estudiantes:
                        </p>
                        <div class="mt-5">
                            @foreach ($students6 as $student)
                                <div class="my-3 flex justify-between p-5 border-2 rounded border-green-500">
                                    <div>
                                        <h2 class="text-green-400 font-bold text-xl">
                                            Información General
                                        </h2>
                                        <div class="mt-5">
                                            <p class="text-gray-400">
                                                Nombre:
                                                <span class="text-black font-bold">
                                                    {{$student->user->name}}
                                                </spanc>
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="text-green-400 font-bold text-xl mb-5">
                                            Acciones
                                        </h2>
                                        <div class="mt-5">
                                            <a 
                                                href="#"
                                                class="mt-5 p-2 bg-blue-500 text-white font-bold hover:bg-blue-700 rounded"
                                            >
                                                Ver Proceso
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-full flex justify-center items-center p-5 mt-3">
                        <div class="w-full p-3 shadow-md">
                            <h2 class="text-center font-bold text-green-400 text-2xl">
                                Ingeniería
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>
