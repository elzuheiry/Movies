

<x-app-layout>
    <section class="container mx-auto my-[3rem]">
        <h1 class="text-[1.5rem] font-[800] capitalize my-[2rem]">{{ __("All Movies") }}</h1>

        <div class="w-full min-h-screen grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
            @foreach ($movies as $movie)
                <x-movie-card :movie='$movie' />
            @endforeach
        </div>
    </section>
</x-app-layout>
