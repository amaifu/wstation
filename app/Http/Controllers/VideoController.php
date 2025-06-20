<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation;

class VideoController extends Controller
{
    public function videoUpload(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'video' => 'required|mimes:mp4,webm,mkv',
            'thumbnail' => 'required|mimes:jpg,png,jpeg,webp,gif,svg',
        ]);

        // Handle Input Data
        $name  = $request->input('name');
        $title = $request->input('title');

        // Handle Video File
        if ($request->hasFile('video')) {
            $video = $request->file('video');

            if ($video->isValid()) {
                // Get file details
                $videoFilename = time().'_'.uniqid().'.'.$video->getClientOriginalName();
                $videoMime = $video->getClientOriginalExtension();
                $videoPath = public_path('files/videos');
                $videoSize = $video->getSize();
                
                $video->move($videoPath, $videoFilename);

            } else {
                return response()->json('Invalid file', 400);
            }
        } else {
            return response()->json('No file uploaded', 400);
        }

        // Handle Thumbnail File
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');

            if ($thumbnail->isValid()) {
                // Get file details
                $thumbnailFilename = time().'_'.uniqid().'.'.$thumbnail->getClientOriginalName();
                $thumbnailMime = $thumbnail->getClientOriginalExtension();
                $thumbnailPath = public_path('files/thumbnails');
                $thumbnailSize = $thumbnail->getSize();
                $thumbnail->move($thumbnailPath, $thumbnailFilename);

            } else {
                return response()->json('Invalid file', 400);
            }
        } else {
            return response()->json('No file uploaded', 400);
        }

        // return response()->json($request);
        // return response()->json([$name, $title, $videoFilename, $videoPath]);

        $videoModel = new Video();
        $videoModel->name = $name;
        $videoModel->title_video = $title;
        $videoModel->filename_video = $videoFilename;
        $videoModel->filename_thumbnail = $thumbnailFilename;
        $videoModel->path_video = $videoPath;
        $videoModel->path_thumbnail = $thumbnailPath;
        $videoModel->mime_type_video = $videoMime;
        $videoModel->mime_type_thumbnail = $thumbnailMime;
        $videoModel->size_video = $videoSize;
        $videoModel->size_thumbnail = $thumbnailSize;

        $videoModel->save();
    }

    public function getVideos() {
        $videos = Video::get(['id_video', 'name', 'title_video', 'filename_video', 'filename_thumbnail', 'path_video', 'path_thumbnail']);
        return response()->json($videos);
    }

    public function playVideo($id) {
        $videos = Video::get(['id_video', 'name', 'title_video', 'filename_video', 'filename_thumbnail', 'path_video', 'path_thumbnail']);
        $json = json_decode($videos);

        $videoPlaying = [];
        $videoRecents = [];

        foreach($json as $j) {
            if($j->id_video == $id) {
                array_push($videoPlaying, $j);
            } else {
                array_push($videoRecents, $j);
            }
        };

        // $video = Video::where('id_video', '=', $id)->get(['title_video', 'filename_video', 'filename_thumbnail', 'path_video', 'path_thumbnail'])->first();

        // $json = json_encode($video);

        return view('videoplayer', ['videoPlaying' => $videoPlaying, 'videoRecents' => $videoRecents]);
    }
}
