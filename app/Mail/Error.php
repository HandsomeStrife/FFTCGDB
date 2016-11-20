<?php

namespace FFTCG\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Error extends Mailable
{
    use Queueable, SerializesModels;

    protected $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('errors@fftcgdb.com')
                    ->to('danives@btopenworld.com')
                    ->subject('FFTCG Error')
                    ->view('errors.email.exception')->with([
                            'content' => $this->content
                    ]);
    }
}
