<div class="space-y-8">
    {{-- Global Navigation Label --}}
    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
        <label class="block text-sm font-bold uppercase tracking-widest text-gray-500">Navigation Label</label>
        <input type="text" wire:model.blur="title" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm font-bold">
    </div>

    {{-- Home Page Specifics --}}
    @if($page->slug === 'home')
        <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
            <h3 class="text-sm font-black uppercase tracking-widest text-blue-800 mb-4">Hero Section</h3>
            <div class="grid grid-cols-1 gap-4">
                <input type="text" wire:model.blur="hero_subtitle" placeholder="Sub-headline" class="w-full border-gray-300 rounded-md">
                <input type="text" wire:model.blur="hero_image" placeholder="Background Image URL" class="w-full border-gray-300 rounded-md">
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" wire:model.blur="hero_cta_text" placeholder="Button Text" class="w-full border-gray-300 rounded-md">
                    <input type="text" wire:model.blur="hero_cta_link" placeholder="Button Link" class="w-full border-gray-300 rounded-md">
                </div>
            </div>
        </div>
    @endif

    {{-- About Page Specifics --}}
    @if($page->slug === 'about')
        <div class="space-y-6">
            <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                <label class="block text-sm font-bold uppercase tracking-widest text-gray-500 mb-2">About Us Body Text</label>
                <textarea wire:model.blur="about_text" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            </div>

            <div class="bg-green-50 p-6 rounded-lg border border-green-200">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-sm font-black uppercase tracking-widest text-green-800">Core Values</h3>
                    <button type="button" wire:click="addValue" class="bg-green-600 text-white text-xs px-3 py-1 rounded-full font-bold">
                        + Add Value
                    </button>
                </div>

                <div class="space-y-4">
                    @foreach($core_values as $index => $value)
                        <div class="flex gap-4 bg-white p-4 rounded shadow-sm border border-green-100">
                            <div class="flex-1 space-y-2">
                                <input type="text" wire:model.blur="core_values.{{ $index }}.title" placeholder="Title" class="w-full border-gray-200 rounded-md text-sm font-bold">
                                <textarea wire:model.blur="core_values.{{ $index }}.desc" placeholder="Description..." class="w-full border-gray-200 rounded-md text-sm" rows="2"></textarea>
                            </div>
                            <button type="button" wire:click="removeValue({{ $index }})" class="text-red-400 hover:text-red-600">
                                Remove
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Sync Indicators --}}
    <div class="fixed bottom-4 right-4 z-50">
        <div wire:loading class="bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg text-sm font-bold animate-pulse">
            Saving...
        </div>
        <div wire:loading.remove class="bg-green-600 text-white px-4 py-2 rounded-full shadow-lg text-sm font-bold">
            ✓ Synced
        </div>
    </div>
</div>