<?php

namespace FFTCG;

use Cmgmyr\Messenger\Models\Models;
use Cmgmyr\Messenger\Models\Thread as T;

class Thread extends T
{
    /**
     * Generates a string of participant information.
     *
     * @param null  $userId
     * @param array $columns
     *
     * @return string
     */
    public function participantsAvatars($userId = null, $columns = ['name'])
    {
        $participantsTable = Models::table('participants');
        $usersTable = Models::table('users');

        $participantNames = $this->getConnection()->table($usersTable)
            ->join($participantsTable, $usersTable . '.id', '=', $participantsTable . '.user_id')
            ->where($participantsTable . '.thread_id', $this->id);

        if ($userId !== null) {
            $participantNames->where($usersTable . '.id', '!=', $userId);
        }

        $a = array();
        foreach ($participantNames->get() as $pn) {
            $a[] = '<img src="//www.gravatar.com/avatar/' . md5($pn->email) . '?s=48" title="' . $pn->username . '" class="img-circle" />';
        }

        return implode(' ', $a);
    }
}
