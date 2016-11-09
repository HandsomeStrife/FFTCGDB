<?php

return [

    'user_model' => FFTCG\User::class,

    'message_model' => Cmgmyr\Messenger\Models\Message::class,

    'participant_model' => Cmgmyr\Messenger\Models\Participant::class,

    'thread_model' => FFTCG\Thread::class,

    /**
     * Define custom database table names.
     */
    'messages_table' => null,

    'participants_table' => null,

    'threads_table' => null,
];
