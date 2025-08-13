<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Universidad Tecnológica de Huejotzingo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center text-3xl font-bold">
                    {{ __("Panel de Administración") }}
                </div>
                <div class="flex gap-5 p-5">
                    <div class="w-full rounded bg-green-300 text-white p-5">
                        <div class="w-full flex justify-center border-1 border-solid border-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"      stroke="currentColor" class="size-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <p class="text-center">
                            Alumnos Totales
                        </p>
                        <p class="text-center font-bold text-6xl mt-3">
                            {{count($students)}}
                        </p>
                    </div>
                    <div class="w-full rounded bg-blue-300 text-white p-5">
                        <div class="w-full flex justify-center border-1 border-solid border-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <p class="text-center">
                            TSUs Totales
                        </p>
                        <p class="text-center font-bold text-3xl">
                            {{count($six)}}
                        </p>
                        <div class="w-full flex justify-center mt-3">
                            <a href="{{route("students")}}" class="p-2 bg-blue-500 rounded text-white hover:bg-blue-700">
                                Ver Más
                            </a>
                        </div>
                    </div>
                    <div class="w-full rounded bg-red-300 text-white p-5">
                        <div class="w-full flex justify-center border-1 border-solid border-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <p class="text-center">
                            Ingenierías Totales
                        </p>
                        <p class="text-center font-bold text-3xl">
                            {{count($eleven)}}
                        </p>
                        <div class="w-full flex justify-center mt-3">
                            <a href="{{route("students.ing")}}" class="p-2 bg-red-500 rounded text-white hover:bg-red-700">
                                Ver Más
                            </a>
                        </div>
                    </div>
                    <div class="w-full rounded bg-purple-300 text-white p-5">
                        <div class="w-full flex justify-center border-1 border-solid border-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <p class="text-center">
                            Administradores Totales
                        </p>
                        <p class="text-center font-bold text-3xl">
                            {{count($admins)}}
                        </p>
                        <div class="w-full flex justify-center mt-3">
                            <a href="{{route("students")}}" class="p-2 bg-purple-500 rounded text-white hover:bg-purple-700">
                                Ver Más
                            </a>
                        </div>
                    </div>
                </div>
                <div class="px-5 py-1M,DKLOP3´{
                <3P  } mt-1 flex justify-center items-center gap-5">
                    <div class="w-full">
                       <h2 class="text-2xl text-center font-bold mb-5">
                            Procesos de Titulacion (TSU)
                        </h2>
                        <div class="flex justify-center items-center gap-3">   
                            <div class="p-3 border-blue-500 border-2 rounded-lg text-center">
                                <div class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                    </svg>
                                </div>
                                <p>
                                    Procesos Totales
                                </p>
                                <p class="text-center font-bold text-3xl">
                                    {{count($six)}}
                                </p>
                            </div>
                            <div class="p-3 border-green-300 border-2 rounded-lg text-center">
                                <div class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <p>
                                    Procesos Completados
                                </p>
                                <p class="text-center font-bold text-3xl">
                                    {{count($students)}}
                                </p>
                            </div>
                            <div class="p-3 border-orange-300 border-2 rounded-lg text-center">
                                <div class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>
                                </div>
                                <p>
                                    Procesos Pendientes
                                </p>
                                <p class="text-center font-bold text-3xl">
                                    {{count($students)}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-5">
                        <h2 class="text-2xl text-center font-bold mb-5">
                            Procesos de Titulacion (Ingeniería)
                        </h2>
                        <div class="flex justify-center items-center gap-3">   
                            <div class="p-3 border-blue-500 border-2 rounded-lg text-center">
                                <div class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                    </svg>
                                </div>
                                <p>
                                    Procesos Totales
                                </p>
                                <p class="text-center font-bold text-3xl">
                                    {{count($eleven)}}
                                </p>
                            </div>
                            <div class="p-3 border-green-300 border-2 rounded-lg text-center">
                                <div class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <p>
                                    Procesos Completados
                                </p>
                                <p class="text-center font-bold text-3xl">
                                    {{count($students)}}
                                </p>
                            </div>
                            <div class="p-3 border-orange-300 border-2 rounded-lg text-center">
                                <div class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>
                                </div>
                                <p>
                                    Procesos Pendientes
                                </p>
                                <p class="text-center font-bold text-3xl">
                                    {{count($students)}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
