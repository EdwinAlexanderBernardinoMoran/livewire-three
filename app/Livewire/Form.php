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
        // Forma 1 de validar campos
        // Validaciones, Cambiar mensaje, Cambiar nombre de campo(atributo)
        $this->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required|exists:categories,id',
            'selectedTags' => 'required|array',
        ], [
            // 'category_id.required' => 'El campo id de la categoria es obligatorio.',
            'title.required' => 'El campo titulo es requerido.',
            'content.required' => 'El campo contenido es requerido.',
            'selectedTags.required' => 'El campo tags es requerido.',
        ], [
            'category_id' => 'categoria'
        ]);

        $post = Post::create(
            $this->only(['category_id', 'title', 'content'])
        );

        $post->tags()->attach($this->selectedTags);

        $this->reset(['category_id', 'title', 'content', 'selectedTags']);

        $this->posts = Post::all();
    }

    public function edit(Post $post)
    {
        $this->resetValidation();
        $this->open = true;

        $this->postEditId = $post->id;

        $this->postEdit['category_id'] = $post->category_id;
        $this->postEdit['title'] = $post->title;
        $this->postEdit['content'] = $post->content;
        $this->postEdit['selectedTags'] = $post->tags->pluck('id')->toArray();
    }

    public function update()
    {
        $this->validate([
            'postEdit.category_id' => 'required|exists:categories,id',
            'postEdit.title' => 'required',
            'postEdit.content' => 'required',
            'postEdit.selectedTags' => 'required|array',
        ]);

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
