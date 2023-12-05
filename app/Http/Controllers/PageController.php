<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Menu;
use App\Models\SectionArticle;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() 
    {
        $articles = SectionArticle::all();
        $author = $articles->where('slug', 'about-the-author')->first();

        $books = Book::all();
        $featured = $books->where('featured')->first();
        $allBooks =  $books->whereNotIn('featured', 1)->sortBy('order');
        
        return view('master')
        ->with('featured', $featured)
        ->with('allBooks', $allBooks)
        ->with('author', $author);
    }
}
