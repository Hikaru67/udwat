<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['books'] = Book::with('category')->orderBy('id', 'desc')->paginate(10);

        return view('master.books.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('master.books.new', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data = $request->all();

        if($request->file_upload){
            $image = @$request->file('file_upload')->storeAs('public/images', $request->file('file_upload')->getClientOriginalName());
            $image = str_replace('public', 'storage', $image);
            $data['image'] = $image;
        }

        Book::create($data);

        return redirect()->route('master.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book->load('category');
        $categories = Category::orderBy('id', 'desc')->get();

        return view('master.books.edit', compact(['book', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Book  book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $data = $request->only(['title', 'description', 'category_id', 'total_quantity', 'lend_quantity']);

        if($request->file_upload){
            $image = @$request->file('file_upload')->storeAs('public/images', $request->file('file_upload')->getClientOriginalName());
            $image = str_replace('public', 'storage', $image);
        }

        foreach ($data as $key => $item) {
            if ($item) {
                $book->$key = $item;
            }
        }
        if (isset($image) && $image) {
            $book->image = $image;
        }
        $book->save();

        return redirect()->route('master.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('master.books.index');
    }
}
