<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Form extends Component
{
    public $tags, $categories;
    public $category_id, $title, $content;
    public $selectedTags = [];

    public $posts;

    public function mount()
    {
        $this->tags = Tag::all();
        $this->categories = Category::all();

        $this->posts = Post::all();
    }

    public function save()
    {
        $post = Post::create(
            $this->only(['category_id', 'title', 'content'])
        );

        $post->tags()->attach($this->selectedTags);

        $this->reset(['category_id', 'title', 'content', 'selectedTags']);

        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.form');
    }
}
