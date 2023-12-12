<?php

namespace App\View\Components;

use App\Models\Comment as ModelsComment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $comments = ModelsComment::whereNull('parent_id')
        ->with('replies')
        ->orderBy('created_at', 'asc')
        ->get();
        

        return view('components.comment')->with('comments', $comments);
    }
}
