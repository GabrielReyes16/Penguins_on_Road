@props(['messages'])

@if ($messages)
    <label style="color: red; justify-content: center;align-items: center">
        @foreach ((array) $messages as $message)
           {{ $message }}
        @endforeach
    </label>
@endif
