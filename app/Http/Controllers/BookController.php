<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books')->select('*')->simplePaginate(5);
        $totalBooks = DB::table('books')->selectRaw('count(id) as total')->get();
        foreach ($totalBooks as $total) {
            $resultTotalBooks = $total->total;
        }
        $users = DB::select('select * from users');
        return view('book.index', [
            'books' => $books,
            // 'totalBooks' => $totalBooks,
            'resultTotalBooks' => $resultTotalBooks,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'writer' => ['required'],
            'publisher' => ['required'],
            'page' => ['required'],
            'is_publish' => ['required'],
            'price' => ['required']
        ]);
        // dd($data);
        DB::insert(
            'insert into books(title, writer, publisher, page, is_publish, price) values(?,?,?,?,?,?)',
            [$data['title'], $data['writer'], $data['publisher'], $data['page'], $data['is_publish'], $data['price']]
        );

        return redirect()->route('book.index')->with('success', 'Data has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $booksId = DB::select('select * from books where id=?', [$book->id]);
        return view('book.edit', [
            'booksId' => $booksId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validate([
            'title' => ['required'],
            'writer' => ['required'],
            'publisher' => ['required'],
            'page' => ['required'],
            'is_publish' => ['required'],
            'price' => ['required']
        ]);
        DB::update('update books set title = ?, writer = ?, publisher = ?, page = ?, is_publish = ?, price = ? where id = ?', [$data['title'], $data['writer'], $data['publisher'], $data['page'], $data['is_publish'], $data['price'], $book->id]);
        return redirect()->route('book.index')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        DB::delete('delete from books where id=?', [$book->id]);
        return redirect()->route('book.index')->with('success', 'Data has been deleted');
    }
}
