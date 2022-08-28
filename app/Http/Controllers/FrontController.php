<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\UserPost;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
   public function home()
   {
    $users=User::with('nidcard')->get();
    return view('home', [
        'page_name'=>'Home Page',
        'name'=>'Laravel 9 Course',
        'users' => $users
    ]);
   }

   public function about(){
    return view('about', [
        'page_name'=>'About Page'
    ]);
   }
   public function contact(){
    $page_name="Contact Page";

    $color="red";
    $products=[
        1=>[
            'name'=>'Bag',
            'color'=>'red',
            'price'=>'1200',
        ],
        2=>[
            'name'=>'sunglass',
            'color'=>'black',
            'price'=>'550',
        ],
        3=>[
            'name'=>'BodySpray',
            'color'=>'Blue',
            'price'=>'850',
        ],
    ];
    $product_count=count($products);
    return view('contact', compact('page_name', 'product_count', 'products'));
   }

   public function service()
   {
    $services=[
        'Web Design',
        'Web Development',
        'App Development',
        'Graphics Design',
    ];

    return view('service', compact('services'));
   }

public function userIndex(){
    $users=User::all();
    return view('home', [
        'users'=>$users
    ]);
}

public function books(){
    // $books=Book::with(['author', 'publisher', 'booktype'])->get();
    // $books=Book::has('publisher')->get();
    // return $books;
    $publishers=Publisher::withCount('books')->get();
    return $publishers;
}
public function positions()
    {
        // $books = Book::with(['author', 'publisher', 'booktype'])->get();

        // long way
        // $positions = UserPost::with('user.country')->get();
        // short way
       $positions = UserPost::with('country')->get();
       return $positions;
    }

}
