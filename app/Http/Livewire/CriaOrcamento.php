<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CriaOrcamento extends Component
{
    public $post;

    public function orcamento($post)
    {
        $this->post = $post;
        dd($this->post);
    }
    
    public function render()
    {
        return view('inicial');
    }
}
