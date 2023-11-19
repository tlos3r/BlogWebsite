<?php

namespace App\Listeners;

use App\Models\Tag;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class CacheTags
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
        Cache::get('tag') ?? Cache::rememberForever('tag', function () {
            return Tag::paginate(5);
        });
    }
}