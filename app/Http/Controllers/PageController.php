<?php

namespace App\Http\Controllers;

use App\Mail\MailNotification;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Endtime;
use App\Models\Lecture;
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

       
        // Filter articles with 'qrcode' in the slug
        $qrcode = $articles->filter(function ($article) {
            return strpos($article->slug, 'qrcode') !== false;
        });

        $books = Book::all();
        $featured = $books->where('featured')->first();
        $allBooks =  $books->whereNotIn('featured', 1)->sortBy('order');

        $reviews = Review::all()->sortBy('order');
        
        return view('master')
        ->with('featured', $featured)
        ->with('allBooks', $allBooks)
        ->with('reviews', $reviews)
        ->with('author', $author)
        ->with('qrcode', $qrcode);
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
        Mail::to('agent.galewilson@gmail.com')->send(new MailNotification($input));

        return redirect()->back()->with(['success' => 'Thank you for contacting us']);
    }
    public function store(Request $request)
    {
       
        $request->validate(['comment'=>'required','name'=>'required']);
        $input = $request->all();

        Comment::create($input);

        return back();
    }
    public function study() 
    {
       
        $lectures = Lecture::all();
        $categories = collect($lectures)->pluck('category')->unique();

        $categoryNames = $categories->mapWithKeys(function ($category) {
            return [$category => formatCategoryName($category)];
        });


        return view('pages.study')
        ->with('lectures', $lectures)
        ->with('categoryNames', $categoryNames)
        ->with('categories', $categories);
    }
    public function end() 
    {
       
        $lectures = Endtime::all();
        $categories = collect($lectures)->pluck('category')->unique();

        $categoryNames = $categories->mapWithKeys(function ($category) {
            return [$category => formatCategoryName($category)];
        });


        return view('pages.endtimes')
        ->with('lectures', $lectures)
        ->with('categoryNames', $categoryNames)
        ->with('categories', $categories);
    }
}
