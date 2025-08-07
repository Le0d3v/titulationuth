@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm my-2 text-red-700 space-y-1 p-2 rounded bg-red-300 border-l-4 border-red-600 ', "id" => "ul-errors"]) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<script>
    
    const ul = document.querySelector("#ul-errors");
    

    setTimeout(() => {
        ul.style.display = "none";
    }, 4000)
</script>


