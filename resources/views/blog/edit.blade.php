<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold">Edit Blog</h1>
                    <form action="{{ route('blog.update', $blog->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mt-4">
                            <label for="title" class="block font-semibold">Title:</label>
                            <input type="text" name="title" id="title" value="{{ $blog->title }}" class="border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full" required>
                        </div>
                        
                        <div class="mt-4">
                            <label for="content" class="block font-semibold">Content:</label>
                            <textarea name="content" id="content" class="border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full" rows="6" required>{{ $blog->content }}</textarea>
                        </div>
                        
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
