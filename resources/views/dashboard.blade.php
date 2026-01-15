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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8 pb-8 border-b">
                        <h3 class="font-bold text-lg mb-4">Create a New Rhizome</h3>
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
                                <label class="block text-sm font-medium">Site Name</label>
                                <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g. Mountain Lotus Digital" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Subdomain (Slug)</label>
                                <div class="flex items-center">
                                    <input type="text" name="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="mountainlotus" required>
                                    <span class="ml-2 text-gray-500">.rhizomecms.test</span>
                                </div>
                            </div>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Site
                            </button>
                        </form>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg mb-4">Your Sites</h3>
                        <ul class="space-y-2">
                            @foreach(auth()->user()->sites as $site)
                                <li class="p-4 bg-gray-50 rounded border flex justify-between">
                                    <strong>{{ $site->name }}</strong>
                                    <a href="http://{{ $site->slug }}.rhizomecms.test:8000" class="text-blue-600 hover:underline" target="_blank">
                                        {{ $site->slug }}.rhizomecms.test
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
