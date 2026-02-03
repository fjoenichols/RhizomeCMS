<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;
use App\Models\Site;

class PageEditor extends Component
{
    public Site $site;
    public Page $page;

    // Standard Properties
    public $title;
    public $content;
    public $about_text;
    public $hero_subtitle;
    public $hero_image;
    public $hero_cta_text;
    public $hero_cta_link;

    // Flexible JSON Properties
    public $core_values = [];
    public $features = [];

    public function mount(Site $site, Page $page)
    {
        $this->site = $site;
        $this->page = $page;
        
        $this->fill($page->toArray());

        $this->core_values = $page->core_values ?? [];
        $this->features = $page->features ?? [];
    }

    public function addValue()
    {
        $this->core_values[] = ['title' => '', 'desc' => ''];
        $this->saveJsonFields();
    }

    public function removeValue($index)
    {
        unset($this->core_values[$index]);
        $this->core_values = array_values($this->core_values); // Reset keys for Blade
        $this->saveJsonFields();
    }

    public function updated($propertyName)
    {
        // Handle nested JSON properties (core_values.0.title, etc.)
        if (str_starts_with($propertyName, 'core_values') || str_starts_with($propertyName, 'features')) {
            $this->saveJsonFields();
        } else {
            // Handle standard columns
            $this->page->update([
                $propertyName => $this->$propertyName
            ]);
        }
    }

    protected function saveJsonFields()
    {
        $this->page->update([
            'core_values' => $this->core_values,
            'features' => $this->features
        ]);
    }

    public function render()
    {
        return view('livewire.page-editor');
    }
}