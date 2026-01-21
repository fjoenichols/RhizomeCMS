<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Page: {{ $page->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <form action="{{ route('sites.pages.update', [$site, $page]) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium">Title</label>
                        <input type="text" name="title" id="title" value="{{ $page->title }}" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ $page->slug }}" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Content</label>
                        <textarea name="content" rows="10" class="w-full border-gray-300 rounded-md shadow-sm">{{ $page->content }}</textarea>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('sites.pages.index', $site) }}" class="text-gray-600">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Update Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');

    titleInput.addEventListener('input', function() {
        const slug = titleInput.value
            .toLowerCase()
            .replace(/[^\w ]+/g, '') // Remove non-word chars
            .replace(/ +/g, '-');    // Replace spaces with -
        
        slugInput.value = slug;
    });
</script>