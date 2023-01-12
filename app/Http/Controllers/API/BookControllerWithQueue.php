<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\BookJob\Create;
use Symfony\Component\HttpFoundation\Response;

class BookControllerWithQueue extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = microtime(true);
        $book = Book::all();
        $end = microtime(true);

        // waktu eksekusi
        $duration = $end - $start;

        $response = [
            "meta" => [
                "status" => "success",
                "code" => Response::HTTP_OK,
                "message" => "Data buku berhasil didapat"    
            ],
            "data" => $book,
            "execution_time" => $duration

        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = microtime(true);
        // memanggil job queue
        $this->dispatch(new Create());
        $end = microtime(true);
        $duration = $end - $start;

        $response = [
            "meta" => [
                "status" => "success",
                "code" => Response::HTTP_OK,
                "message" => "Data buku berhasil didapat"    
            ],
            "execution_time" => $duration

        ];

        return response()->json($response);
    }
}
