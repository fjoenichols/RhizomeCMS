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

    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        
        <nav class="flex items-center space-x-6 mb-8 pb-4 border-b border-gray-100">
            @foreach($pages as $p)
                <a href="/{{ $p->slug === 'home' ? '' : $p->slug }}" 
                   class="text-sm font-bold {{ (request()->is('/') && $p->slug === 'home') || request()->is($p->slug) ? 'text-green-600' : 'text-gray-400 hover:text-gray-600' }}">
                    {{ $p->title }}
                </a>
            @endforeach
        </nav>

        <div class="max-w-2xl w-full bg-white shadow-xl rounded-lg overflow-hidden border-t-8 {{ $themeClasses }}">
            <div class="p-8">
                
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">
                    {{ $site->hero_title ?? $site->name }} 
                </h1>
                
                @if($site->hero_subtitle)
                    <p class="text-xl text-gray-500 mb-6 font-medium">{{ $site->hero_subtitle }}</p>
                @endif
                
                <div class="prose max-w-none text-lg text-gray-600 leading-relaxed mb-8">
                    {!! nl2br(e($homePage->content)) !!} 
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-6 border-t border-gray-100">
                    @if($site->cta_text)
                        <a href="/contact" class="inline-block px-6 py-3 rounded-md font-bold text-white shadow-md hover:opacity-90 transition {{ str_replace('border-', 'bg-', explode(' ', $themeClasses)[0]) }}">
                            {{ $site->cta_text }}
                        </a>
                    @endif

                    @if($site->business_phone)
                        <p class="text-gray-900 font-bold">
                            Call us: <span class="text-gray-600 font-medium">{{ $site->business_phone }}</span>
                        </p>
                    @endif
                </div>

                <div class="pt-6 mt-6 border-t border-gray-50">
                    <p class="text-xs text-gray-400 italic">
                        Powered by 
                        <a href="{{ 'http://' . config('app.url') . '/register' }}" class="font-semibold hover:text-gray-600 transition">
                            RhizomeCMS
                        </a> | Sprouted by {{ $site->user->name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>