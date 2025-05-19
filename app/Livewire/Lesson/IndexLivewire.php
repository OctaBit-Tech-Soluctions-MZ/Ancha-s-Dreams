<?php

namespace App\Livewire\Lesson;

use App\Models\Comment;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class IndexLivewire extends Component
{
    use WithFileUploads;
    public $slug,
        $comment,
        $reply,
        $attachment = null,
        $replyCommentId = null;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $lesson = Content::with(['comments' => function ($query) {
            $query->with(['users', 'replies' => function ($query1) {
                $query1->with('users');
            }]);
        }, 'courses'])->where('slug', $this->slug)->firstOrFail();
        $query = Content::query();

        $query = $query->where('course_id', $lesson->courses->id);
        $query = $query->where('id', '<>', $lesson->id);
        $lessons_other = $query->get();
        return view('livewire.lesson.index-livewire', compact('lesson', 'lessons_other'));
    }

    public function sendComment()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $content = Content::where('slug', $this->slug)->firstOrFail();

        auth()->user()->comments()->create([
            'content_id' => $content->id,
            'comment_text' => $this->comment,
            'attachment' => ''
        ]);

        $this->reset('comment');
    }

    public function setReply($replyCommentId)
    {
        $this->replyCommentId = $replyCommentId;
    }

    public function sendReply()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $comment = Comment::findOrFail($this->replyCommentId);

        auth()->user()->replies()->create([
            'comment_id' => $comment->id,
            'comment_text' => $this->reply,
            'attachment' => ''
        ]);
        $this->reset('reply', 'replyCommentId');
    }

    public function removeFile()
    {
        if ($this->attachment) {
            $path = $this->attachment->getFilename(); // ex: ABCD1234-example.png
            Storage::disk('local')->delete('livewire-tmp/' . $path);
            $this->reset('attacheent');
        }
    }
}
