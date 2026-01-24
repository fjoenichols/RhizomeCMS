<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-900">

    <div class="max-w-5xl mx-auto px-4 py-12">
        
        <header class="flex flex-col md:flex-row justify-between items-center mb-16">
            <div class="text-2xl font-black tracking-tighter text-gray-900 mb-4 md:mb-0">
                {{ $site->name }}
            </div>
            
            <nav class="flex items-center space-x-8">
                <a href="/" class="text-sm font-bold {{ request()->is('/') ? 'text-gray-900 border-b-2 border-gray-900' : 'text-gray-400 hover:text-gray-600' }}">
                    Home
                </a>
                @foreach($pages as $p)
                    <a href="/{{ $p->slug }}" class="text-sm font-bold text-gray-400 hover:text-gray-600">
                        {{ $p->title }}
                    </a>
                @endforeach
            </nav>
        </header>

        <section class="relative overflow-hidden rounded-3xl p-8 md:p-16 mb-12 
            {{ $site->theme_color === 'green' ? 'bg-green-600 text-white' : '' }}
            {{ $site->theme_color === 'blue' ? 'bg-blue-600 text-white' : '' }}
            {{ $site->theme_color === 'purple' ? 'bg-purple-600 text-white' : '' }}">
            
            <div class="relative z-10 max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-black leading-tight mb-6">
                    {{ $site->hero_title ?? 'Welcome to ' . $site->name }}
                </h1>
                
                <p class="text-xl md:text-2xl opacity-90 mb-10 leading-relaxed">
                    {{ $site->hero_subtitle ?? $site->description }}
                </p>

                @if($site->cta_text)
                    <a href="/contact" class="inline-block bg-white text-gray-900 px-8 py-4 rounded-xl font-black text-lg shadow-xl hover:scale-105 transition-transform">
                        {{ $site->cta_text }}
                    </a>
                @endif
            </div>

            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-white opacity-10 rounded-full"></div>
        </section>

        <article class="prose prose-lg max-w-none bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100">
            <h2 class="text-3xl font-bold mb-6">Our Story</h2>
            <div class="text-gray-600 leading-relaxed">
                {!! nl2br(e($site->description)) !!}
            </div>
        </article>

        <footer class="mt-20 pt-10 border-t border-gray-200 flex flex-col items-center">
            @if($site->business_phone)
                <div class="mb-6">
                    <span class="text-sm uppercase tracking-widest text-gray-400 block text-center mb-1">Call Us Directly</span>
                    <a href="tel:{{ $site->business_phone }}" class="text-2xl font-bold hover:underline">
                        {{ $site->business_phone }}
                    </a>
                </div>
            @endif
            
            <p class="text-gray-400 text-sm">
                &copy; {{ date('Y') }} {{ $site->name }}. Powered by <span class="font-bold text-green-600">RhizomeCMS</span>.
            </p>
        </footer>
    </div>

</body>
</html>