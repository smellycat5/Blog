<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Recent Blogs:') }}
                </h2>
            </div>
            <div>
                @livewire('search')
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <ul class="space-y-4">
                        @foreach ($blogs as $blog)
                            <li>
                                <a href="{{ route('blog.show', $blog->id) }}"
                                    class="block bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                    <div class="p-4">
                                        <h3 class="text-xl font-bold mb-2">{{ $blog->title }}</h3>
                                        {{-- <p class="text-gray-600 truncate">{!! $blog->content !!}</p> --}}
                                        <p class="text-gray-800 text-left">Author: {{ $blog->author->name }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="py-8">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
