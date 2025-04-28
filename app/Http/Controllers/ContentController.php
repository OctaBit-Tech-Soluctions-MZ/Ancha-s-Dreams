<?php

namespace App\Http\Controllers;

use App\Helper\GenerateID;
use App\Http\Requests\ContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Jobs\JobUploadVideoToCloud;
use App\Models\Content;
use App\Models\Course;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function index($slug) {
        $content = Content::with('courses')->where('slug', $slug)->firstOrFail();
        return view('lesson', compact('content'));
    }

    public function lessons($slug){

        $course = Course::where('slug', $slug)->firstOrFail();
        return view('instructor.lesson',compact('course'));
    }
    public function add($slug){
        Course::where('slug', $slug)->firstOrFail();
        return view('instructor.lesson.add', ['slug' => $slug]);
    }
    public function edit($slug){
        $content = Content::where('slug',$slug)->firstOrFail();
        return view('instructor.lesson.edit', compact('content'));
    }

    public function store(ContentRequest $request, $slug) {
        $course = Course::where('slug', $slug)->firstOrFail();
        $maxOrder = $course->contents->max('order');
        $newOrder = $maxOrder ? $maxOrder + 1 : 1;
    
        $content = new Content();
        $content->title = $request->title;
        $content->description = $request->description;
        $content->course_id = $course->id;
        $content->order = $newOrder;
        $content->save();
    
        // Salvar o vídeo num local seguro antes de mandar o Job
        $path = $request->file('video')->store('tmp','tmp'); // salva em storage/app/tmp
        $path = basename($path);
        // dispara o Job com o arquivo salvo
        JobUploadVideoToCloud::dispatch($content->id, $path, $request->title)->onQueue('default');
    
        return redirect()->back()->with('success', 'Aula '.$request->title.' Criada com sucesso');
    }
    
    public function update(UpdateContentRequest $request, $slug) 
    {
        $content = Content::where('slug',$slug)->firstOrFail();
        $content->title = $request->title;
        $content->description = $request->description;
        $content->save();
        if (!empty($request->file('video'))) {
            // Salvar o vídeo num local seguro antes de mandar o Job
            $path = $request->file('video')->store('tmp','tmp'); // salva em storage/app/tmp
            $path = basename($path);
            // Agora sim, dispara o Job com o arquivo salvo
            JobUploadVideoToCloud::dispatch($content->id, $path, $request->title)->onQueue('default');
        }
        return redirect()->back()->with('success','Aula '.$request->title.' Foi Actualizado com sucesso');
    }

    public function destroy($slug) {
        Content::where('slug',$slug)->firstOrFail()->delete();
        return redirect()->back()->with('success', 'Aula Removida com sucesso');
    }
}
