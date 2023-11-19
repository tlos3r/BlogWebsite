<?php

namespace App\Listeners;

use App\Models\Category;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class CacheCategories
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
        Cache::get('category') ?? Cache::rememberForever('category', function () {
            return Category::paginate(5);
        });
    }
}