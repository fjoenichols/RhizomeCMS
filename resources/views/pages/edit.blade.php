<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tending to: {{ $page->title }} ({{ $site->name }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('sites.pages.update', [$site, $page]) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Page Title</label>
                        <input type="text" name="title" id="title" value="{{ $page->title }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ $page->slug }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Page Content</label>
                        <textarea name="content" rows="10" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ $page->content }}</textarea>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t">
                        <a href="{{ route('sites.pages.index', $site) }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 font-bold">
                            Update Page
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');

            if (titleInput && slugInput) {
                titleInput.addEventListener('input', function() {
                    const slug = titleInput.value
                        .toLowerCase()
                        .trim()
                        .replace(/[^\w ]+/g, '')
                        .replace(/ +/g, '-');
                    
                    slugInput.value = slug;
                });
            }
        });
    </script>
</x-app-layout>