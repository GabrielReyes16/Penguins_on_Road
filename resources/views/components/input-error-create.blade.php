@props(['messages'])

@if ($messages)
    <label style="color: red; justify-content: center;align-items: center">
        {{ __('El email ya está en uso. Vuelva a intentarlo con uno diferente!') }}
    </label>
@endif
