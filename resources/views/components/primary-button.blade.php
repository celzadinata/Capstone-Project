<button class="btn" {{ $attributes->merge(['type' => 'submit']) }}>
    {{ $slot }}
</button>

<style>
    .btn{
        color: #fff;
        background-color: #CE3ABD;
        border-radius: 10px;
    }
    .btn:hover{
        color: #CE3ABD;
        background-color: #fff;
        border: 2px solid #CE3ABD;

    }
</style>
