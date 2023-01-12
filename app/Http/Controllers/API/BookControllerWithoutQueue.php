<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

class BookControllerWithoutQueue extends Controller
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
        $faker = Factory::create();
        for ($i = 0; $i < 1000; $i++) {
            $book = new Book();
            $book->title = $faker->sentence;
            $book->image = $faker->imageUrl($width = 640, $height = 480, 'books');
            $book->save();
        }
        $end = microtime(true);
        $duration = $end - $start;
        $response = [
            "meta" => [
                "status" => "success",
                "code" => Response::HTTP_OK,
                "message" => "Data buku berhasil dibuat"    
            ],
            "execution_time" => $duration

        ];

        return response()->json($response);
    }
}
