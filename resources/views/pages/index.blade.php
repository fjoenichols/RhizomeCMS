<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pages for: {{ $site->name }}
            </h2>
            <a href="{{ route('sites.pages.create', $site) }}" class="bg-green-600 text-white px-4 py-2 rounded-md text-sm hover:bg-green-700">
                + Sprout New Page
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($pages->isEmpty())
                    <p class="text-gray-500 text-center py-8">No pages sprouted yet. Start by creating a home or contact page!</p>
                @else
                    <ul class="divide-y divide-gray-200">
                        @foreach($pages as $page)
                            <li class="py-4 flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $page->title }}</h3>
                                    <p class="text-sm text-gray-500">Slug: /{{ $page->slug }}</p>
                                </div>
                                <div class="flex space-x-4">
                                    <a href="http://{{ $site->slug }}.rhizomecms.test:8000/{{ $page->slug }}" target="_blank" class="text-blue-600 hover:underline text-sm">View Live</a>
                                    </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <div class="mt-6 border-t pt-4">
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:underline">← Back to Shoots</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>