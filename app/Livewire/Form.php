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

    // Form edit
    public $open = false;
    public $postEdit = [
        'category_id' => '',
        'title' => '',
        'content' => '',
        'selectedTags' => [],
    ];

    public $postEditId;

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

    public function edit(Post $post)
    {

        $this->open = true;

        $this->postEditId = $post->id;

        $this->postEdit['category_id'] = $post->category_id;
        $this->postEdit['title'] = $post->title;
        $this->postEdit['content'] = $post->content;
        $this->postEdit['selectedTags'] = $post->tags->pluck('id')->toArray();
    }

    public function update()
    {
        $post = Post::find($this->postEditId);

        $post->update(
            $this->postEdit
        );

        $post->tags()->sync($this->postEdit['selectedTags']);

        $this->reset(['postEditId', 'postEdit', 'open']);

        $this->posts = Post::all();
    }

    public function destroy(Post $post)
    {
        $post->delete();

        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.form');
    }
}
