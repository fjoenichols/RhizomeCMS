<x-tenant-layout :title="$site->name . ' | ' . $page->title" :pages="$pages">
    {{-- 1. Hero / Narrative Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tighter leading-tight mb-6">
                    {{ $page->title }}
                </h1>
                <div class="prose prose-lg text-gray-600">
                    {!! nl2br(e($page->about_text ?? $page->content)) !!}
                </div>
            </div>

            <div class="relative">
                @if($page->about_image)
                    <img src="{{ $page->about_image }}" alt="{{ $page->title }}" class="rounded-lg shadow-2xl relative z-10 w-full object-cover aspect-square">
                @else
                    <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center italic text-gray-400 border-2 border-dashed border-gray-300">
                        [Team Photo Placeholder]
                    </div>
                @endif
                <div class="absolute -bottom-6 -right-6 w-64 h-64 -z-0 rounded-lg" 
                     style="background-color: {{ $site->theme_color ?? '#facc15' }}"></div>
            </div>
        </div>
    </section>

    {{-- 2. Dynamic Core Values Section --}}
    @if(!empty($page->core_values))
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold uppercase tracking-widest">Our Core Values</h2>
                <div class="w-24 h-1 mx-auto mt-4" style="background-color: {{ $site->theme_color ?? '#facc15' }}"></div>
            </div>

            {{-- Grid layout that adjusts based on item count --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($page->core_values as $value)
                    <div class="p-8 border border-gray-100 shadow-sm hover:shadow-md transition-shadow bg-white rounded-lg">
                        <h3 class="font-black uppercase mb-4 text-xl border-b-2 inline-block pb-1" 
                            style="border-color: {{ $site->theme_color ?? '#facc15' }}">
                            {{ $value['title'] ?? 'Untitled Value' }}
                        </h3>
                        <p class="text-gray-600 leading-relaxed mt-4">
                            {{ $value['desc'] ?? '' }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- 3. Call to Action --}}
    <section class="py-20 bg-gray-900 text-white text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold uppercase mb-8">Work with a team that values precision</h2>
            <a href="/contact" 
               class="inline-block px-10 py-4 font-black uppercase tracking-widest transition transform hover:scale-105"
               style="background-color: {{ $site->theme_color ?? '#facc15' }}; color: #000;">
                Get a Quote
            </a>
        </div>
    </section>
</x-tenant-layout>