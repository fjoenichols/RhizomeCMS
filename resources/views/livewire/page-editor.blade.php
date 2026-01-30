<div class="space-y-8">
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
        <h3 class="text-sm font-bold uppercase tracking-wider text-gray-500 mb-4">Hero Section</h3>
        
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Main Headline</label>
                <input type="text" wire:model.live.blur="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Sub-headline</label>
                <input type="text" wire:model.live.blur="hero_subtitle" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Background Image URL</label>
                <input type="text" wire:model.live.blur="hero_image" placeholder="https://unsplash.com/..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>
    </div>

    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
        <h3 class="text-sm font-bold uppercase tracking-wider text-gray-500 mb-4">Primary Button (CTA)</h3>
        
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Button Text</label>
                <input type="text" wire:model.live.blur="hero_cta_text" placeholder="e.g. View Services" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Button Link</label>
                <input type="text" wire:model.live.blur="hero_cta_link" placeholder="e.g. /services" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>
    </div>

    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
        <h3 class="text-sm font-bold uppercase tracking-wider text-gray-500 mb-4">About Section</h3>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">About Us Body Text</label>
            <textarea wire:model.live.blur="about_text" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>
    </div>

    <div class="fixed bottom-4 right-4">
        <div wire:loading class="bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg text-sm font-bold animate-pulse">
            Saving to Postgres...
        </div>
        <div wire:loading.remove class="bg-green-600 text-white px-4 py-2 rounded-full shadow-lg text-sm font-bold">
            ✓ Changes Synced
        </div>
    </div>
</div>