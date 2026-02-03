<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Rhizome Site' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <nav class="bg-white border-b border-gray-100 py-4 px-6 flex justify-between items-center">
        <div class="text-2xl font-black uppercase tracking-tighter">
            <a href="/">{{ app('current_site')->name }}</a>
        </div>
        
        <div class="flex space-x-8 font-bold uppercase text-sm tracking-widest">
            @foreach($pages as $navPage)
                <a href="/{{ $navPage->slug === 'home' ? '' : $navPage->slug }}" 
                   class="hover:text-yellow-500 transition {{ request()->is($navPage->slug) ? 'text-yellow-500' : 'text-gray-600' }}">
                    {{ $navPage->title }}
                </a>
            @endforeach
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>
</body>
</html>

