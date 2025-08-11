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
                    {{ __("Administración de Usuarios") }}
                </div>
                <div class="flex justify-between items-center px-5">
                  <p class="text-center text-lg">
                    Total de Estudiantes: 
                      <span class="font-bold text-green-400">
                        {{count($users)}}
                      </span>
                  </p>
                  <div>
                    <div class="mb-4">
                      <h3 class="text-lg font-semibold mb-2">Filtrar por Grado</h3>
                      <div class="flex space-x-4 items-center">
                          <label class="flex items-center">
                              <span class="mr-2">Todos</span>
                              <input type="radio" name="grade" value="all" class="hidden peer" checked>
                              <span class="bg-gray-500 text-white px-4 py-2 rounded cursor-pointer peer-checked:bg-green-600">
                                  <!-- Espacio para el botón de selección -->
                              </span>
                          </label>
                          <label class="flex items-center">
                              <span class="mr-2">9°</span>
                              <input type="radio" name="grade" value="9" class="hidden peer">
                              <span class="bg-gray-500 text-white px-4 py-2 rounded cursor-pointer peer-checked:bg-green-600">
                                  <!-- Espacio para el botón de selección -->
                              </span>
                          </label>
                          <label class="flex items-center">
                              <span class="mr-2">4°</span>
                              <input type="radio" name="grade" value="4" class="hidden peer">
                              <span class="bg-gray-500 text-white px-4 py-2 rounded cursor-pointer peer-checked:bg-green-600">
                                  <!-- Espacio para el botón de selección -->
                              </span>
                          </label>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
