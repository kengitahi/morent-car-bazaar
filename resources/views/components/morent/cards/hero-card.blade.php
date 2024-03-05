<div class="max-w-full h-80 p-6 rounded-lg shadow bg-cover bg-center" style="background:url('{{$bg}}'); background-size:cover; background-position:bottom">
    <h2 class="mb-2 text-2xl font-bold tracking-tight text-white">
        <a href="#">
            {{$title}}
        </a>
    </h2>

    <p class="mb-4 font-normal text-xl text-white">
        {{$description}}
    </p>
    <a href="#" class="inline-flex items-center px-3 py-2 text-base font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        {{$button}}
        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
        </svg>
    </a>
</div>