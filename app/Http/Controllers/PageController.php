<?php

namespace App\Http\Controllers;

use App\Mail\MailNotification;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Menu;
use App\Models\Review;
use App\Models\SectionArticle;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home() 
    {
        $articles = SectionArticle::all();
        $author = $articles->where('slug', 'about-the-author')->first();

        $books = Book::all();
        $featured = $books->where('featured')->first();
        $allBooks =  $books->whereNotIn('featured', 1)->sortBy('order');

        $reviews = Review::all()->sortBy('order');
        
        return view('master')
        ->with('featured', $featured)
        ->with('allBooks', $allBooks)
        ->with('reviews', $reviews)
        ->with('author', $author);
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new Captcha]
        ]);

        $input = $request->all();
        Mail::to('clintscopy@gmail.com')->send(new MailNotification($input));

        return redirect()->back()->with(['success' => 'Thank you for contacting us']);
    }
    public function store(Request $request)
    {
       
        $request->validate(['comment'=>'required','name'=>'required']);
        $input = $request->all();

        Comment::create($input);

        return back();
    }
}
