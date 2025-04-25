<?php

namespace App\Http\Controllers;

use App\Helper\GenerateID;
use App\Http\Requests\ContentRequest;
use App\Models\Content;
use App\Models\Course;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index($slug){

        Course::where('slug', $slug)->firstOrFail();
        $contents = Content::all();
        return view('instructor.lesson',compact('slug', 'contents'));
    }
    public function add($slug){
        Course::where('slug', $slug)->firstOrFail();
        return view('instructor.lesson.add', ['slug' => $slug]);
    }

    public function watch($slug) {
        $course = Course::where('slug', $slug)->firstOrFail();
        $contents = Content::where('course_id', $course->course_id)->get();
        $contentFirst = $contents->first();
        return view('courses.courses_watch', compact('contents', 'contentFirst'));
    }

    public function store(ContentRequest $request, $slug) {

        $course = Course::where('slug',$slug)->firstOrFail();
        $content = new Content();
        $content->title = $request->title;
        $content->description = $request->description;
        $content->course_id = $course->course_id;
        $googleDriveService = new GoogleDriveService();
        $drive_file = $googleDriveService->uploadVideo($request->video->getPathName(), $request->title, 
                                                        $course->drive_folder_id);
        $googleDriveService->permission($drive_file->id);
        $content->drive_file_id = $drive_file->id;
        $content->url_view = $drive_file->webViewLink;
        $content->url_download = $drive_file->webContentLink;
        $content->url_preview = 'https://drive.google.com/file/d/' . $drive_file->id . '/preview';

        $content->save();

        return redirect()->back()->with('success', 'Video Aula adicionado com sucesso');
    }
}
