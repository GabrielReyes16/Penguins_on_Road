
@props(['messages'])

@if ($messages)
    <label style="color: red; justify-content: center;align-items: center">
        {{ __('Lo sentimos pero tu email o contraseña no son correctas. Vuelva a intentarlo!') }}
    </label>
@endif
