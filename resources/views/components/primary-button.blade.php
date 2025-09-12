<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-yellow-400 text-black font-semibold py-3 rounded-lg w-full shadow-md hover:bg-yellow-500 transition']) }}>
    {{ $slot }}
</button>
