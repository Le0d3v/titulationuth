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
                    <label for="careerFilter">Carrera:</label>
                    <select id="careerFilter">
                        <option value="">Todos</option>
                        <option value="Tecnologías de la Información">Tecnologías de la Información</option>
                        <option value="Procesos Industriales">Procesos Industriales</option>
                        <!-- Agrega más opciones de carrera -->
                    </select>

                    <label for="semesterFilter">Semestre:</label>
                    <select id="semesterFilter">
                        <option value="">Todos</option>
                        <option value="6">6</option>
                        <option value="11">11</option>
                    </select>

                    <button id="applyFilters">Aplicar filtros</button>
                  </div>
                </div>  
                <div class="mt-5 p-5">
                    <table id="dataSchoolTable" class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-green-500 text-white">
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Matricula</th>
                                <th class="px-4 py-2">Carrera</th>
                                <th class="px-4 py-2">Especialidad</th>
                                <th class="px-4 py-2">Semestre</th>
                                <th class="px-4 py-2">Turno</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($dataUsers as $data)
                                <tr class="border-b-2 py-1">
                                    <td class="text-center p-3">{{$data->user->name}}</td>
                                    <td class="text-center p-3">{{$data->user->tuition}}</td>
                                    <td class="text-center p-3">{{$data->career}}</td>
                                    <td class="text-center p-3">{{$data->specialty}}</td>
                                    <td class="text-center p-3">{{$data->semester}}</td>
                                    <td class="text-center p-3">{{$data->shift}}</td>
                                    <td class="flex justify-center p-2">
                                        <button 
                                            class="showData p-2 rounded bg-green-400 text-white font-bold hover:bg-green-600 cursor-pointer text-sm"
                                            onclick="showData($data->id)"
                                        >
                                            Ver Más
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="dataModalLabel" role="dialog" aria-modal="true" id="dataModal" style="display: none;">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 sm:mx-0">
                <div class="bg-gray-100 rounded-t-lg px-4 py-3 flex justify-between items-center">
                    <h5 class="text-gray-800 font-bold" id="dataModalLabel">Más Datos</h5>
                    <button type="button" class="text-gray-500 hover:text-gray-800 focus:outline-none close-modal">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 modal-body">
                    <!-- Aquí irá el contenido del modal -->
                </div>
            </div>
        </div>
    </div>


    <script>
        // Selecciona todos los botones con la clase 'showData'
        const showDataButtons = document.querySelectorAll('.showData');
        const modal = document.getElementById('dataModal');
        const closeButtons = document.querySelectorAll('.close-modal');

        // Obtener el token CSRF
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Agrega un evento de clic a cada botón 'showData'
        showDataButtons.forEach(button => {
            button.addEventListener('click', () => {
                const dataId = button.dataset.id;
                
                // Hace una solicitud fetch para obtener los datos del registro
                fetch(`/dataschools/${dataId}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => {
                    // Verifica si la respuesta es exitosa
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Error al obtener los datos del registro');
                    }
                })
                .then(data => {
                    // Llena el contenido del modal con los datos del registro
                    document.getElementById('dataModalLabel').textContent = `Más Datos de ${data.user.name}`;
                    document.querySelector('.modal-body').innerHTML = `
                        <p>Nombre: ${data.user.name}</p>
                        <p>Matrícula: ${data.user.tuition}</p>
                        <p>Carrera: ${data.career}</p>
                        <p>Especialidad: ${data.specialty}</p>
                        <p>Semestre: ${data.semester}</p>
                        <p>Turno: ${data.shift}</p>
                    `;
                    
                    // Muestra el modal
                    modal.style.display = 'flex';
                })
                .catch(error => {
                    console.error(error);
                    // Maneja el error de alguna manera, por ejemplo, mostrando un mensaje de error al usuario
                });
            });
        });

        // Agrega un evento de clic a los botones de cerrar
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        });

    </script>
</x-app-layout>
