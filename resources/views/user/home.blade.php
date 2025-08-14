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
                    {{ __("Dashboard") }}
                </div>
                <div class="flex gap-10 w-full p-5">
                  <div class="w-full">
                    <div class="shadow rounded p-3 w-full">  
                      <div class="w-full flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-9">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                      </div>
                      <h3 class="text-center text-green-400 font-bold text-2xl py-2">
                        Progreso de Titulación
                      </h3>
                      <x-progress-bar :percentage="$progress"></x-progress-bar>
                    </div>
                    <div class="mt-5 w-full">
                      <h2 class="text-center text-xl font-bold">
                        Procesos
                      </h2>
                      <div class="mt-5 flex gap-5 items-center w-full">
                        <div class="p-5 bg-cyan-300 rounded text-white">
                          <div class="w-full flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                            </svg>
                          </div>
                          <p class="text-center text-sm">
                            Procesos Totales
                          </p>
                          <div class="flex w-full justify-center">
                            <span class="text-3xl text-center w-full">
                              4
                            </span>
                          </div>
                        </div>
                        <div class="p-5 bg-green-300 rounded text-white">
                          <div class="w-full flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                          </div>
                          <p class="text-center text-sm">
                            Procesos Completados
                          </p>
                          <div class="w-full flex justify-center">
                            <span class="text-3xl text-center w-full">
                              {{count($completes)}}
                            </span>
                          </div>
                        </div>
                        <div class="p-5 bg-yellow-300 rounded text-white">
                          <div class="w-full flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                          </div>
                          <p class="text-center text-sm">
                            Procesos Pendientes
                          </p>
                          <div class="w-full flex justify-center">
                            <span class="text-3xl text-center w-full">
                              {{count($incompletes)}}
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="w-full p-5 shadow">
                    <div class="w-full flex justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>
                    </div>
                    <h2 class="text-center text-blue-400 text-2xl font-bold">
                      Datos Academicos
                    </h2>
                    <div class="mt-3">
                      <p class="text-sm">
                        Nombre:
                      </p>
                      <div class="p-1 bg-gray-600 rounded-lg text-white font-bold text-lg">
                        {{$user->name}}
                      </div>
                    </div>
                    <div class="my-3">
                      <p class="text-sm">
                        Carrera:
                      </p>
                      <div class="p-1 bg-gray-600 rounded-lg text-white font-bold text-lg">
                        {{$data_user[0]->career}}
                      </div>
                    </div>
                    <div class="my-3 w-full flex gap-5">
                      <div class="w-full">
                        <p class="text-sm">
                          Especialidad:
                        </p>
                        <div class="p-1 bg-gray-600 rounded-lg text-white font-bold text-lg">
                          {{$data_user[0]->specialty}}
                        </div>
                      </div>
                      <div class="w-full">
                        <p class="text-sm">
                          Cuatrimestre:
                        </p>
                        <div class="p-1 bg-gray-600 rounded-lg text-white font-bold text-lg">
                          {{$data_user[0]->semester}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
