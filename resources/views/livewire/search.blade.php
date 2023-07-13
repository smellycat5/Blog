<div class="relative">
    <input type="text" wire:model.debounce.300ms="search" placeholder="Search for Blogs"
        class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <ul class="absolute z-10 w-full mt-2 bg-white border border-gray-300 rounded-md shadow-lg">
        @foreach ($blogs as $blog)
            <a href="{{ route('blog.show', $blog->id) }}">
                <li class="py-2 px-3 hover:bg-gray-200">
                    <h6 class="mb-2">{{ $blog->title }}</h6>
                </li>
            </a>
        @endforeach
    </ul>
</div>
