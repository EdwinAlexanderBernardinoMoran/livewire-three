<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Form extends Component
{
    public $tags, $categories;

    public PostCreateForm $postCreate;
    public PostEditForm $postEdit;

    public $posts;

    public function mount()
    {
        $this->tags = Tag::all();
        $this->categories = Category::all();

        $this->posts = Post::all();
    }

    public function save()
    {
        // Validacion unicamente solo del formObjets
        $this->postCreate->save();
        $this->posts = Post::all();
        $this->dispatch('post', 'Post creado con exito');
    }

    public function edit($post)
    {
        $this->resetValidation();
        $this->postEdit->edit($post);
    }

    public function update()
    {
        $this->postEdit->update();
        $this->posts = Post::all();
        $this->dispatch('post', 'Post actualizado con exito');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        $this->posts = Post::all();
        $this->dispatch('post', 'Post eliminado con exito');
    }

    public function render()
    {
        return view('livewire.form');
    }
}
