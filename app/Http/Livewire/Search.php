<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $blogs = Blog::where('title', $this->search)->get();
        return view('livewire.search', [
            'blogs' => $blogs
        ]);
    }
}
