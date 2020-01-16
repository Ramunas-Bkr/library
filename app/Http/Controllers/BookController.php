<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Author;
use Validator;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all()->sortBy('title');
        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all()->sortBy('surname');
        return view('book.create', ['authors' => $authors]);

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
            'book_title' => ['required', 'min:2', 'max:255'],
            'book_isbn' => ['required', 'min:13', 'max:17'],
            'book_pages' => ['required', 'integer', 'min:4', 'max:10000'],
            'book_date' => ['required', 'integer', 'min:3']
        ],
        [
            'book_title.required' => 'Reikia įvesti knygos pavadinimą',
            'book_title.min' => 'Pavadinimas per trumpas (min 2 simboliai)',
            'book_title.max' => 'Pavadinimas per ilgas (max 255 simboliai)',
            'book_isbn.required' => 'Reikia įvesti isbn numerį',
            'book_isbn.min' => 'Netinkamas ISBN kodas',
            'book_isbn.max' => 'Netinkamas ISBN kodas',
            'book_pages.required' => 'Reikia įvesti puslapių skaičių',
            'book_pages.integer' => 'Puslapių kiekis įvedamas skaičiais',
            'book_pages.min' => 'Turi būti bent 4 puslapiai',
            'book_pages.max' => 'Per stora knyga',
            'book_date.required' => 'Reikia įvesti leidimo metus',
            'book_date.integer' => 'Metai turi būti įvesti skaičiais',
            // 'book_date.min' => 'Metus sudaro 4 skaičiai',
            // 'book_date.max' => 'Metus sudaro 4 skaičiai',

        ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        };

        $file = $request->file('book_photo');
        $file_name = $file->getClientOriginalName();

        $destinationPath = public_path() . '/img';
        $file->move($destinationPath, $file_name);


        $book = new Book;
        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->date = $request->book_date;
        $book->publisher = $request->book_publisher;
        $book->translate = $request->book_translate;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->photo = $file_name;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai įrašyta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', ['book' => $book, 'authors' => $authors]);
    }

    public function list(Book $book)
    {
        $authors = Author::all();
        return view('book.list', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $validator = Validator::make($request->all(),
        [
            'book_title' => ['required', 'min:2', 'max:255'],
            'book_isbn' => ['required', 'min:13', 'max:17'],
            'book_pages' => ['required', 'integer', 'min:4', 'max:10000'],
            'book_date' => ['required', 'integer', 'min:3',]
        ],
        [
            'book_title.required' => 'Reikia įvesti knygos pavadinimą',
            'book_title.min' => 'Pavadinimas per trumpas (min 2 simboliai)',
            'book_title.max' => 'Pavadinimas per ilgas (max 255 simboliai)',
            'book_isbn.required' => 'Reikia įvesti isbn numerį',
            'book_isbn.min' => 'Netinkamas ISBN kodas',
            'book_isbn.max' => 'Netinkamas ISBN kodas',
            'book_pages.required' => 'Reikia įvesti puslapių skaičių',
            'book_pages.integer' => 'Puslapių kiekis įvedamas skaičiais',
            'book_pages.min' => 'Turi būti bent 4 puslapiai',
            'book_pages.max' => 'Per stora knyga',
            'book_date.required' => 'Reikia įvesti leidimo metus',
            'book_date.integer' => 'Metai turi būti įvesti skaičiais',
            // 'book_date.min' => 'Metus sudaro 4 skaičiai',
            // 'book_date.max' => 'Metus sudaro 4 skaičiai',

        ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        };

        $file = $request->file('book_photo');
        $file_name = $file->getClientOriginalName();

        $destinationPath = public_path() . '/img';
        $file->move($destinationPath, $file_name);


        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->date = $request->book_date;
        $book->publisher = $request->book_publisher;
        $book->translate = $request->book_translate;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->photo = $file_name;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success_message', 'Sekmingai ištrintas.');
    }

    public function pdf (Book $book) {
        $pdf = PDF::loadView('book.pdf', ['book' => $book]);
        return $pdf->download($book->title.'.pdf');
    }
}

