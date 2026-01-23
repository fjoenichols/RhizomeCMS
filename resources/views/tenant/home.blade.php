<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    @php
        $colors = [
            'blue' => 'bg-blue-600 border-blue-800',
            'green' => 'bg-green-600 border-green-800',
            'purple' => 'bg-purple-600 border-purple-800',
        ];
        $themeClasses = $colors[$site->theme_color] ?? $colors['blue'];
    @endphp

    <div class="min-h-screen flex flex-col items-center justify-center">
        <nav class="flex items-center space-x-6 mb-8 pb-4 border-b border-gray-100">
            <a href="/" 
            class="text-sm font-bold {{ request()->is('/') ? 'text-green-600' : 'text-gray-400 hover:text-gray-600' }}">
                Home
            </a>

            @foreach($pages as $p)
                <a href="/{{ $p->slug }}" 
                class="text-sm font-bold {{ request()->is($p->slug) ? 'text-green-600' : 'text-gray-900' }}">
                    {{ $p->title }}
                </a>
            @endforeach
        </nav>
        <div class="max-w-2xl w-full bg-white shadow-xl rounded-lg overflow-hidden border-t-8 {{ $themeClasses }}">
            <div class="p-8">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">
                    {{ $site->name }}
                </h1>
                
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    {{ $site->description ?? 'This shoot is just beginning to grow.' }}
                </p>

                <div class="pt-6 border-t border-gray-100">
                    <p class="text-sm text-gray-500 italic">
                        Powered by 
                        <a href="{{ 'http://' . config('app.url') . '/register' }}" class="font-semibold hover:text-gray-600 transition">
                            RhizomeCMS
                        </a> | Sprouted by {{ $site->user->name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-12 py-6 text-center border-t border-gray-200 w-full max-w-2xl">
        <p class="text-sm text-gray-400">
            Powered by 
            <a href="{{ 'http://' . config('app.url') . '/register' }}" class="font-semibold hover:text-gray-600 transition">
                RhizomeCMS
            </a>
        </p>
    </footer>
</body>
</html>