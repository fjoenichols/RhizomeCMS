<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;
use App\Models\Site;

class PageEditor extends Component
{
    public Site $site;
    public Page $page;

    // The Properties
    public $title;
    public $content;
    public $hero_subtitle;
    public $hero_image;
    public $hero_cta_text;
    public $hero_cta_link;
    public $about_text;

    public function mount(Site $site, Page $page)
    {
        $this->site = $site;
        $this->page = $page;
        
        // Load existing data into the properties
        $this->title = $page->title;
        $this->content = $page->content;
        $this->hero_subtitle = $page->hero_subtitle;
        $this->hero_image = $page->hero_image;
        $this->hero_cta_text = $page->hero_cta_text;
        $this->hero_cta_link = $page->hero_cta_link;
        $this->about_text = $page->about_text;
    }

    public function updated($propertyName)
    {
        // This is the magic: any change to the properties above 
        // triggers an instant save to the database.
        $this->page->update([
            $propertyName => $this->$propertyName
        ]);
    }

    public function render()
    {
        return view('livewire.page-editor');
    }
}