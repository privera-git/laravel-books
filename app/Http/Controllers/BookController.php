<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('Book.index', [ 'books' => $books ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Book.create', [ 'success' => null ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = Input::get('title');
        $book->author = Input::get('author');
        $book->isbn = Input::get('isbn');
        $book->created_by = 1;
        $book->updated_by = 1;

        $book->save();

        return view('Book.create', [ 'success' => true ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('Book.show', [ 'book' => $book ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        return view('Book.edit', [ 'book' => $book ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if ($book == null)
        {
            return view('Book.edit', [ 'book' => $book, 'success' => false ]);    
        }

        $book->title = Input::get('title');
        $book->author = Input::get('author');
        $book->isbn = Input::get('isbn');

        $book->save();

        return view('Book.edit', [ 'book' => $book, 'success' => true ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtener el libro desde la base de datos
        $book = Book::find($id);
        
        // Validar que exista el libro
        if ($book == null) {
            // $books = Book::all();
            // return view('Book.index', [ 'books' => $books, 'success' => false ]);

            // Crear la respuesta
            $response = [ 'success' => false, 'message' => 'The requested book does not exist.' ];

            // Enviar la respuesta al cliente
            if (request()->ajax()) {
                // Si es asíncrono se retorna un objeto json
                return $response;
            }
            else {
                // Se reenvía al usuario al formulario de libros
                return redirect()->action('BookController@index')
                    ->with($response); 
            }
        }

        // Eliminar el libro
        $book->delete();

        // Crear la respuesta
        $response = [ 'success' => true ];

        // Enviar la respuesta al cliente
        if (request()->ajax()) {
            // Si es asíncrono se retorna un objeto json
            return $response;
        }
        else {
            // Se reenvía al usuario al formulario de libros
            return redirect()->action('BookController@index')
                ->with($response);
        }
    }
}
