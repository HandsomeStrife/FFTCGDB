<?php

namespace FFTCG;

trait Commentable
{
    /**
     * Get all of the model's comments.
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
