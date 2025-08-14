<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Universidad Tecnológica de Huejotzingo') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900 text-center text-3xl font-bold py-3">
                    {{ __("Dashboard") }}
                </div>
                <div class="flex gap-10 w-full p-5">
                  <div class="w-full">
                    <div class="shadow rounded p-3 w-full">  
                      <h3 class="text-center text-green-400 font-bold text-2xl py-2">
                        Progreso de Titulación
                      </h3>
                      <x-progress-bar :percentage="$progress"></x-progress-bar>
                    </div>
                    <div class="mt-10 w-full">
                      <h2 class="text-center text-xl font-bold">
                        Procesos
                      </h2>
                      <div class="mt-5 flex gap-5 items-center w-full">
                        <div class="p-5 bg-purple-300 rounded text-white">
                          <p class="text-center">
                            Procesos Totales
                          </p>
                          <span class="text-3xl text-center w-full">
                            4
                          </span>
                        </div>
                        <div class="p-5 bg-blue-300 rounded text-white">
                          <p class="text-center">
                            Procesos Completados
                          </p>
                          <span class="text-3xl text-center w-full">
                            4
                          </span>
                        </div>
                        <div class="p-5 bg-orange-300 rounded text-white">
                          <p class="text-center">
                            Procesos Pendientes
                          </p>
                          <span class="text-3xl text-center w-full">
                            4
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="w-full p-5 shadow">
                    <h2 class="text-center text-cyan-600 text-2xl font-bold">
                      Datos Academicos
                    </h2>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
