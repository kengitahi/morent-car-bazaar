<div class="mb-8 sm:mb-4 p-4 shadow-2xl rounded-lg">
    <header class="flex flex-cols justify-between items-center gap-4 mb-2">
        <div class="space-y-1">
            <h2 class="text-secondary-500 font-bold text-lg"><a href="{{route('car.show', $car->id)}}"> {{$car->name}}</a></h2>
            <p class="text-sm text-secondary-400 capitalize">
                <a href="{{route('cars.category', $car->type)}}">{{$car->type}}</a>
            </p>
        </div>
        <div class="text-secondary-400"> <!-- If car is in wishlist, fill with color red #ED3F3F which will be the text color -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
        </div>
    </header>
    <main class="space-y-4">
        <div>
            <!-- <img src="{{$car->images[0]}}" alt="{{$car->name}}" class="rounded-lg"> -->
            <a href="{{route('car.show', $car->id)}}">
                <img src="{{ asset( $car->images[0])}}" alt="{{$car->name}}" class="rounded-lg">
            </a>
        </div>
        <div class="grid grid-cols-2 gap-1 lg:gap-2">
            <div class="flex gap-1 items-center">
                <div class="text-secondary-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>

                </div>
                <p class="text-secondary-400 text-sm capitalize">{{$car->fuel}}</p>
            </div>
            <div class="flex gap-1 items-center">
                <div class="text-secondary-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24">
                        <path fill="currentColor" d="m22.34 9.33-2-1c-.37-.18-.83-.04-1.01.33-.19.38-.04.83.33 1.01l1.59.79v4.79l-3.75.01V5c0-2-1.34-3-3-3h-8c-1.66 0-3 1-3 3v16.25H2c-.41 0-.75.34-.75.75s.34.75.75.75h17c.41 0 .75-.34.75-.75s-.34-.75-.75-.75h-1.5v-4.49l4.5-.01c.42 0 .75-.34.75-.75v-6a.76.76 0 0 0-.41-.67ZM6 6.89C6 5.5 6.85 5 7.89 5h5.23C14.15 5 15 5.5 15 6.89v1.23C15 9.5 14.15 10 13.11 10H7.89C6.85 10 6 9.5 6 8.11V6.89Zm.5 5.36h3c.41 0 .75.34.75.75s-.34.75-.75.75h-3c-.41 0-.75-.34-.75-.75s.34-.75.75-.75Z" />
                    </svg>
                </div>
                <p class="text-secondary-400 text-sm">{{$car->fuel=="gasoline"? $car->fuel_capacity . ' L' :$car->range . ' Kms'}}</p>
                <!-- <p class="text-secondary-400 text-sm">{{$car->fuel_capacity}} {{$car->fuel=="gasoline"?'L':'Kms'}}</p> -->
            </div>
            <div class="flex gap-1 items-center">
                <div class="text-secondary-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24">
                        <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.53 2 12 2Z" />
                        <rect width="16" height="16" x="4" y="4" fill="#fff" rx="8" />
                        <path fill="currentColor" d="M12 6c-3.312 0-6 2.688-6 6s2.688 6 6 6 6-2.688 6-6-2.682-6-6-6Z" />
                        <rect width="8" height="8" x="8" y="8" fill="#fff" rx="4" />
                        <path fill="currentColor" d="M11 17h2v4h-2zm6-6h4v2h-4zM3 11h4v2H3z" />
                    </svg>
                </div>
                <p class="capitalize text-secondary-400 text-sm">{{$car->steering}}</p>
            </div>
            <div class="flex gap-1 items-center">
                <div class="text-secondary-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24">
                        <path fill="currentColor" d="M9 2C6.38 2 4.25 4.13 4.25 6.75c0 2.57 2.01 4.65 4.63 4.74.08-.01.16-.01.22 0h.07a4.738 4.738 0 0 0 4.58-4.74C13.75 4.13 11.62 2 9 2Zm5.08 12.15c-2.79-1.86-7.34-1.86-10.15 0-1.27.85-1.97 2-1.97 3.23s.7 2.37 1.96 3.21C5.32 21.53 7.16 22 9 22c1.84 0 3.68-.47 5.08-1.41 1.26-.85 1.96-1.99 1.96-3.23-.01-1.23-.7-2.37-1.96-3.21Zm5.91-6.81c.16 1.94-1.22 3.64-3.13 3.87h-.05c-.06 0-.12 0-.17.02-.97.05-1.86-.26-2.53-.83 1.03-.92 1.62-2.3 1.5-3.8a4.64 4.64 0 0 0-.77-2.18 3.592 3.592 0 0 1 5.15 2.92Z" />
                        <path fill="currentColor" d="M21.99 16.59c-.08.97-.7 1.81-1.74 2.38-1 .55-2.26.81-3.51.78.72-.65 1.14-1.46 1.22-2.32.1-1.24-.49-2.43-1.67-3.38-.67-.53-1.45-.95-2.3-1.26 2.21-.64 4.99-.21 6.7 1.17.92.74 1.39 1.67 1.3 2.63Z" />
                    </svg>
                </div>
                <p class="text-secondary-400 text-sm">{{$car->capacity}} people</p>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="flex flex-col gap-0.5">
                <p>
                    <span class="text-secondary-500 font-bold text-base">${{$car->regular_price}}/</span><span class="text-secondary-400 text-sm">day</span>
                </p>
                <p class="text-secondary-400 text-sm line-through">${{$car->discounted_price}}</p>

            </div>
            <a href="{{route('car.show', $car->id)}}" class="inline-flex items-center px-3 py-2 text-base font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                See car
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </main>
</div>