<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tending to: {{ $site->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('sites.update', $site) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Shoot Name</label>
                        <input type="text" name="name" value="{{ $site->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Shoot Description</label>
                        <textarea name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $site->description }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Theme Color</label>
                        <select name="theme_color" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="blue" {{ $site->theme_color == 'blue' ? 'selected' : '' }}>Blue</option>
                            <option value="green" {{ $site->theme_color == 'green' ? 'selected' : '' }}>Green</option>
                            <option value="purple" {{ $site->theme_color == 'purple' ? 'selected' : '' }}>Purple</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t">
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>