<x-tenant-layout :title="$site->name . ' | Home'" :pages="$pages">
    {{-- Hero Section --}}
    <section class="relative h-[600px] flex items-center justify-center bg-gray-900 text-white">
        @if($page->hero_image)
            <img src="{{ $page->hero_image }}" class="absolute inset-0 w-full h-full object-cover opacity-50">
        @endif

        <div class="relative z-10 text-center px-4">
            <h1 class="text-5xl font-black uppercase tracking-tighter mb-4">
                {{ $page->title }}
            </h1>
            @if($page->hero_subtitle)
                <p class="text-xl max-w-2xl mx-auto mb-8 text-gray-200">
                    {{ $page->hero_subtitle }}
                </p>
            @endif
            @if($page->hero_cta_text)
                <a href="{{ $page->hero_cta_link ?? '#' }}" class="inline-block bg-yellow-400 text-black px-8 py-4 font-bold uppercase tracking-widest hover:bg-yellow-500 transition">
                    {{ $page->hero_cta_text }}
                </a>
            @endif
        </div>
    </section>

    {{-- Content Section --}}
    <div class="max-w-4xl mx-auto py-20 px-6 prose prose-lg">
        {!! nl2br(e($page->about_text ?? $page->content)) !!}
    </div>
</x-tenant-layout>