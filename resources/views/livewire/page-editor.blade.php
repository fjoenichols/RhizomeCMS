<div class="space-y-4">
    <div>
        <label class="block font-bold">Page Title</label>
        {{-- wire:model.live.blur means it saves the moment you click away --}}
        <input type="text" wire:model.live.blur="title" class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block font-bold">Content</label>
        <textarea wire:model.live.blur="content" rows="10" class="w-full border rounded p-2"></textarea>
    </div>

    <div class="flex items-center space-x-2 text-sm">
        <span wire:loading class="text-blue-600 animate-pulse">Saving to Postgres...</span>
        <span wire:loading.remove class="text-green-600">✓ All changes saved</span>
    </div>
</div>