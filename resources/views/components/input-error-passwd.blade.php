@props(['messages'])

@if ($messages)
    <label style="color: red; justify-content: center;align-items: center">
        {{ __('Las contraseñas no coinciden. Prueba de nuevo!') }}
    </label>
@endif
