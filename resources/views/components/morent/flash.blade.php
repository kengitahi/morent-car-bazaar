@if (session('message'))
<div class="text-center p-4 bg-secondary-500/50 text-white font-bold text-lg w-full">
    {{ session('message') }}
</div>
@endif