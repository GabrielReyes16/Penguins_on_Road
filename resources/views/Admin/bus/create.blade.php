<x-app-layout>
    <br>
    <div class="rectangulo"> {{ __('Crear un bus') }}</div>
    <br>
    <div class="flex justify-center">
        <div class="crear_item">
          <form method="POST" action="{{ route('admin.buses.store') }}">
            @csrf
                @include('admin.bus.form')
            </form>
        </div>
    </div> <br>
</x-app-layout>



