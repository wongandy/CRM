<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public function download(Media $mediaItem)
    {
        return $mediaItem;
    }

    public function destroy(Media $mediaItem)
    {
        $mediaItem->delete();

        return back();
    }
}
