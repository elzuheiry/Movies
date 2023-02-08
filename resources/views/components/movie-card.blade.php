

<div class=" bg-slate-300 h-[25rem] rounded-lg overflow-hidden">
    <div class="w-full h-[10rem] bg-slate-400">
        <img class="w-full h-full object-cover" src="{{ asset("upload_files/movie/" . $movie->thumbnail) }}" alt="{{ $movie->title }}">
    </div>

    <div class="p-[1rem]">
        <div class="my-[0.5rem]">
            <h1 class="text-[0.9rem] capitalize font-[500] text-[#000000]">{{ $movie->title }}</h1>
        </div>
        <div class="mb-[1.5rem]">
            <h1 class="text-[1.1rem] capitalize font-[700] text-[#000000]">{{ __("Rate") . ": " . $movie->rate }}</h1>
        </div>
        <div class="mb-[0.5rem]">
            <p class="text-[0.8rem] capitalize font-[400] text-[#000000] bg-slate-100 rounded-full inline-block px-7 py-3">{{ $movie->category->title }}</p>
        </div>
        <div>
            <p class="text-[0.8rem] capitalize font-[400] text-[#000000]">{{ $movie->created_at->diffForHumans() }}</p>
        </div>
    </div>
</div>