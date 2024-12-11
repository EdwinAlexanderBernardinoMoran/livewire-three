<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PostEditForm extends Form
{
    #[Rule(['required'])]
    public $title;

    #[Rule(['required', 'exists:categories,id'])]
    public $category_id;

    #[Rule(['required'])]
    public $content;

    #[Rule(['required', 'array'])]
    public $tags;

    public $open = false;
    public $postId = '';

    public function edit($post)
    {
        $this->open = true;

        $this->postId = $post;

        $post = Post::find($post);

        $this->category_id = $post->category_id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->tags = $post->tags->pluck('id')->toArray();
    }

    public function update()
    {
        $this->validate();
        $post = Post::find($this->postId);

        $post->update(
            $this->only('category_id', 'title', 'content')
        );

        $post->tags()->sync($this->tags);

        $this->reset();
    }

}
