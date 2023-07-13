<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden break-words shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <h1 class="text-3xl font-bold">{{ $blog->title }}</h1>
                    </div>  
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('blog.edit', $blog->id) }}" class="text-blue-500 hover:text-blue-600 font-semibold mr-2">Edit</a>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600 font-semibold">Delete</button>
                        </form>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 mb-4">Author: {{ $blog->author->name }}</p>
                    </div>
                    <p class="text-gray-600 break-words">{{ $blog->content }}</p>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
