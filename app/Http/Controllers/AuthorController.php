<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Validator;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author :: all()->sortBy('surname');
        return view ( 'author.index' , [ 'authors' => $authors ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ( 'author.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'author_name' => ['required', 'min:1', 'max:64'],
            'author_surname' => ['required', 'min:1', 'max:64'],
        ],
        [
            'author_name.min' => 'Vardas per trumpas (min 2 simboliai)',
            'author_surname.min' => 'Vardas per trumpas (min 2 simboliai)',
            'author_name.required' => 'Būtina įvesti vardą',
            'author_surname.required' => 'Būtina įvesti pavardę',
            'author_name.max' => 'Vardas per ilgas (max 64 simboliai)',
            'author_surname.max' => 'Vardas per ilgas (max 64 simboliai)',

        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
        $author = new Author;

        $file = $request->file('author_photo');
        $file_name = $file->getClientOriginalName();

        $destinationPath = public_path() . '/img';
        $file->move($destinationPath, $file_name);

        $author -> name = $request -> author_name;
        $author -> surname = $request -> author_surname;
        $author -> photo = $file_name;
        $author -> save ();
        return redirect()->route('author.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    public function list(Author $author)
    {
        $books = Book::all()->sortBy('date');
        // $books = Book::orderBy('surname') ->get();
        return view('author.list', ['author' => $author, 'books' => $books,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {

        $validator = Validator::make($request->all(),
        [
            'author_name' => ['required', 'min:2', 'max:64'],
            'author_surname' => ['required', 'min:2', 'max:64'],
        ],
        [
            'author_name.min' => 'Vardas per trumpas (min 2 simboliai)',
            'author_surname.min' => 'Vardas per trumpas (min 2 simboliai)',
            'author_name.required' => 'Būtina įvesti vardą',
            'author_surname.required' => 'Būtina įvesti pavardę',
            'author_name.max' => 'Vardas per ilgas (max 64 simboliai)',
            'author_surname.max' => 'Vardas per ilgas (max 64 simboliai)',

        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
        $file = $request->file('author_photo');
        $file_name = $file->getClientOriginalName();

        $destinationPath = public_path() . '/img';
        $file->move($destinationPath, $file_name);

        $author -> name = $request -> author_name;
        $author -> surname = $request -> author_surname;
        $author -> photo = $file_name;
        $author -> save ();
        return redirect()->route('author.index')->with('success_message', 'Sėkmingai pakeistas.');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if($author->authorBooks->count()){
            return redirect()->route('author.index')->with('info_message', 'Trinti negalima, nes turi knygų.');
        }
        $author->delete();
        return redirect()->route('author.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}