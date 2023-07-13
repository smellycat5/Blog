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
                            <textarea name="content" id="content" class="border border-gray-300 rounded-lg px-4 py-2 mt-1 w-full" rows="6" required>{!! $blog->content !!}</textarea>
                        </div>

                        <script>
                            class MyUploadAdapter {
                                constructor(loader) {
                                    this.loader = loader;
                                }

                                upload() {
                                    return this.loader.file
                                        .then(file => new Promise((resolve, reject) => {
                                            this._initRequest(resolve, reject);
                                            this._initListeners(resolve, reject, file);
                                            this._sendRequest(file);
                                        }));
                                }

                                _initRequest(resolve, reject) {
                                    const xhr = this.xhr = new XMLHttpRequest();
                                    xhr.open('POST', '{{ route('blog.upload') }}', true);
                                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                                    xhr.responseType = 'json';

                                    xhr.onload = () => {
                                        if (xhr.status >= 200 && xhr.status < 300) {
                                            resolve(xhr.response);
                                        } else {
                                            reject(xhr.statusText);
                                        }
                                    };

                                    xhr.onerror = () => reject(xhr.statusText);
                                }

                                _initListeners(resolve, reject, file) {
                                    const xhr = this.xhr;
                                    const loader = this.loader;
                                    const genericErrorText = `Couldn't upload file: ${file.name}.`;

                                    xhr.upload.onprogress = (event) => {
                                        loader.uploadTotal = event.total;
                                        loader.uploaded = event.loaded;
                                    };

                                    xhr.onerror = () => reject(genericErrorText);
                                    xhr.onabort = () => reject();
                                    xhr.onload = () => {
                                        const response = xhr.response;

                                        if (!response || response.error) {
                                            return reject(response && response.error ? response.error.message : genericErrorText);
                                        }

                                        resolve({
                                            default: response.url,
                                        });
                                    };
                                }

                                _sendRequest(file) {
                                    const data = new FormData();
                                    data.append('upload', file);
                                    this.xhr.send(data);
                                }

                                abort() {
                                    if (this.xhr) {
                                        this.xhr.abort();
                                    }
                                }
                            }

                            function MyCustomUploadAdapterPlugin(editor) {
                                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                                    return new MyUploadAdapter(loader);
                                };
                            }
                            ClassicEditor
                                .create(document.querySelector('#content'), {
                                    extraPlugins: [MyCustomUploadAdapterPlugin],
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                        
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
