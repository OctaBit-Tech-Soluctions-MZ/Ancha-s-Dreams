<?php

namespace App\Livewire\Lesson;

use App\Models\Comment;
use App\Models\Content;
use Illuminate\Support\Facades\DB;
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
        $replyCommentId = null,
        $lesson,
        $lessons_other;

    public function mount($slug)
    {
        $this->slug = $slug;
        $user = auth()->user(); // usuário logado

        // Lição atual
        $this->lesson = Content::with(['comments' => function ($query) {
            $query->with(['users', 'replies' => function ($query1) {
                $query1->with('users');
            }]);
        }, 'courses'])->where('slug', $this->slug)->firstOrFail();
        
        $this->prevWatchCheck($user);
        $this->markAsWatched();

        // Outras lições do mesmo curso, exceto a atual
        $this->lessons_other = Content::where('course_id', $this->lesson->course_id)
            ->where('id', '<>', $this->lesson->id)
            ->get();
    }
    public function render()
    {

        return view('livewire.lesson.index-livewire');
    }

    private function prevWatchCheck($user)
    {
        // Busca a lição anterior pela posição
        $previous = Content::where('course_id', $this->lesson->course_id)
            ->where('order', '<', $this->lesson->order)
            ->orderBy('order', 'desc')
            ->first();

        // Se existe lição anterior, verifica se foi assistida
        if ($previous) {
            $prevWatch = DB::table('content_users')
                ->where('user_id', $user->id)
                ->where('content_id', $previous->id)
                ->where('watched', true)
                ->exists();

            if (!$prevWatch) {
                abort(403, 'Você precisa assistir ao vídeo anterior primeiro.');
            }
        }
    }

    public function markAsWatched()
    {
        $user = auth()->user();
        $contentId = $this->lesson->id;

        DB::table('content_users')->updateOrInsert(
            ['user_id' => $user->id, 'content_id' => $contentId],
            ['watched' => true, 'updated_at' => now(), 'created_at' => now()]
        );
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
