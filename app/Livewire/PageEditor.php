<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;
use App\Models\Site;

class PageEditor extends Component
{
    public Site $site;
    public Page $page;
    public $title;
    public $content;

    public function mount(Site $site, Page $page)
    {
        $this->site = $site;
        $this->page = $page;
        $this->title = $page->title;
        $this->content = $page->content;
    }

    public function updated($propertyName)
    {
        $this->page->update([
            $propertyName => $this->$propertyName
        ]);
    }

    public function render()
    {
        return view('livewire.page-editor');
    }
}