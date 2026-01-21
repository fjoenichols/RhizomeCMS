<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sprout New Page for {{ $site->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('sites.pages.store', $site) }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Page Title</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g. Contact Us" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g. contact" required>
                        <p class="mt-1 text-xs text-gray-500">This determines the URL: {{ $site->slug }}.rhizomecms.test/slug</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Page Content</label>
                        <textarea name="content" rows="10" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Tell your story here..." required></textarea>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t">
                        <a href="{{ route('sites.pages.index', $site) }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 font-bold">
                            Sprout Page
                        </button>
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