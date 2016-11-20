<?php

namespace FFTCG\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Commented extends Mailable
{
    use Queueable, SerializesModels;

    protected $type;
    protected $author;
    protected $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($comment, $type = 'direct')
    {
        $this->type = $type;
        $this->content = $comment->comment;
        $this->author = $comment->user->name;
        $this->url = 'http://fftcgdb.com/d/' . $comment->deck->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->type == 'direct') {
            $heading = "You've had a comment on your deck build!";
        } else {
            $heading = "You were mentioned in a comment!";
        }
        return $this->view('emails.comment')->subject($heading)->with([
            'heading' => $heading,
            'content' => $this->content,
            'author' => $this->author,
            'actionUrl' => $this->url
        ]);
    }
}
