<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Universidad Tecnológica de Huejotzingo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="mb-4">
            <button id="openModal" class="bg-green-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700">
              Registrar Nuevo Estudiante
            </button>
          </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 w-full text-center font-bold">
                    {{ __("Administración de Usuarios") }}
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center w-full h-screen px-28 transition">
      @include("admin.students.form-students")
    </div>

    <script>
      document.getElementById('openModal').addEventListener('click', function() {
          document.getElementById('modal').classList.remove('hidden');
          document.getElementById('modal').classList.add('flex');
          document.getElementById('modal').classList.add('justify-center');
        });
        
        document.getElementById('closeModal').addEventListener('click', function() {
          document.getElementById('modal').classList.add('hidden');
          document.getElementById('modal').classList.remove('flex');
          document.getElementById('modal').classList.remove('justify-center');
        });
        
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
          event.preventDefault();
          // Aquí puedes agregar la lógica para enviar el formulario
          alert('Formulario enviado');
          document.getElementById('modal').classList.add('hidden');
          document.getElementById('modal').classList.remove('flex');
          document.getElementById('modal').classList.remove('justify-center');
      });
    </script>
</x-app-layout>
