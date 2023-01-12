<?php

namespace App\Jobs\BookJob;

use Faker\Factory;
use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class Create implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Tempat coding
        $faker = Factory::create();
        for ($i = 0; $i < 1000; $i++) {
            $book = new Book();
            $book->title = $faker->sentence;
            $book->image = $faker->imageUrl($width = 640, $height = 480, 'books');
            $book->save();
        }
    }
}
