<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8 pb-8 border-b">
                        <h3 class="font-bold text-lg mb-4">Sprout a New Shoot</h3>
                        @if(session('success'))
                            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded border border-green-200">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded border border-red-200">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('sites.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium">Shoot Name</label>
                                <input type="text" name="name" id="site_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g. Mountain Lotus Digital" required>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium">Shoot Description</label>
                                <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="What will this shoot grow into?"></textarea>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-medium">Theme Color</label>
                                <select name="theme_color" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="green">Green</option>
                                    <option value="blue">Blue</option>
                                    <option value="purple">Purple</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Subdomain (Slug)</label>
                                <div class="flex items-center">
                                    <input type="text" name="slug" id="site_slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="mountainlotus" required>
                                    <span class="ml-2 text-gray-500">.rhizomecms.test</span>
                                </div>
                            </div>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Sprout
                            </button>
                        </form>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg mb-4">Your Shoots</h3>
                        <ul class="space-y-4">
                            @foreach(auth()->user()->sites as $site)
                                <li class="p-6 bg-white rounded-lg border shadow-sm flex items-center justify-between">
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900">{{ $site->name }}</h4>
                                        <a href="http://{{ $site->slug }}.rhizomecms.test:8000" class="text-sm text-blue-600 hover:underline" target="_blank">
                                            {{ $site->slug }}.rhizomecms.test
                                        </a>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('sites.pages.index', $site) }}" class="text-sm font-medium text-green-600 hover:text-green-900">
                                            Manage Pages
                                        </a>
                                        <a href="{{ route('sites.edit', $site) }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                                            Edit
                                        </a>

                                        <form action="{{ route('sites.destroy', $site) }}" method="POST" onsubmit="return confirm('Are you sure you want to prune this shoot?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-900">
                                                Prune
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.getElementById('site_name');
        const slugInput = document.getElementById('site_slug');

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function() {
                const slug = nameInput.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
                
                slugInput.value = slug;
            });
        }
    });
</script>