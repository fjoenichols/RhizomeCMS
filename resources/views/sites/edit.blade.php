<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Settings for: {{ $site->name }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-700">
                &larr; Back to Shoots
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('sites.update', $site) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="bg-white p-6 shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2 italic text-green-700">1. Basic Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Site Name</label>
                            <input type="text" name="name" value="{{ old('name', $site->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subdomain (Slug)</label>
                            <input type="text" value="{{ $site->slug }}" class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm cursor-not-allowed" disabled title="Subdomains cannot be changed">
                            <p class="text-xs text-gray-400 mt-1">Subdomains are permanent to protect your SEO.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2 italic text-green-700">2. Hero & Brand Identity</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Hero Title</label>
                            <input type="text" name="hero_title" value="{{ old('hero_title', $site->hero_title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" placeholder="e.g. Expert Plumbing Services">
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Business Phone</label>
                            <input type="text" name="business_phone" value="{{ old('business_phone', $site->business_phone) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" placeholder="e.g. 555-0123">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Hero Subtitle</label>
                            <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $site->hero_subtitle) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" placeholder="e.g. Fast, reliable, and affordable plumbing.">
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Call to Action (Button Text)</label>
                            <input type="text" name="cta_text" value="{{ old('cta_text', $site->cta_text) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" placeholder="e.g. Get a Free Quote">
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2 italic text-green-700">3. Visuals & Metadata</h3>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Theme Color</label>
                            <select name="theme_color" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                                <option value="green" {{ $site->theme_color == 'green' ? 'selected' : '' }}>Green</option>
                                <option value="blue" {{ $site->theme_color == 'blue' ? 'selected' : '' }}>Blue</option>
                                <option value="purple" {{ $site->theme_color == 'purple' ? 'selected' : '' }}>Purple</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Site Description (SEO Meta)</label>
                            <textarea name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('description', $site->description) }}</textarea>
                            <p class="text-xs text-gray-400 mt-1">This appears in search results and when sharing your link.</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    @if(session('success'))
                        <span class="text-green-600 font-medium animate-pulse">Saved!</span>
                    @endif
                    <button type="submit" class="bg-green-600 text-white px-8 py-3 rounded-md font-bold text-lg hover:bg-green-700 shadow-lg transition transform hover:-translate-y-0.5">
                        Save All Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>