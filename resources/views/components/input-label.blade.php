@props(['value'])

<label {{ $attributes->merge(['class' => 'textinput']) }}>
    {{ $value ?? $slot }}
</label>
