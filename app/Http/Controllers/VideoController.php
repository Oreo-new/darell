<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;


class VideoController extends Controller
{
    public function downloadVideo(Request $request)
    {
        
        $url = $request->query('url');
        if (!$url) {
            return response()->json(['error' => 'No URL provided'], 400);
        }

        $yt = new YoutubeDl();
        // For more options go to https://github.com/rg3/youtube-dl#user-content-options
        $yt->setBinPath('/usr/local/bin/yt-dlp');
        
        $collection = $yt->download(
            Options::create()
                ->downloadPath(public_path('downloads'))
                ->url($url)
                ->output('%(title)s.%(ext)s')
        );
        dd($collection->getVideos());
        $video = $collection->getVideos()[0];

        if ($video->getError() !== null) {
            return response()->json(['error' => 'Failed to download video'], 500);
        }

        return response()->download($video->getFile()->getPathname());
        }
       


        
}
