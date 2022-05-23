<?php

namespace App\Observers;

use Request;
use App\Submission;
use App\SubmissionLog;

class SubmissionObserver
{
    /**
     * Handle the submission "created" event.
     *
     * @param  \App\Submission  $submission
     * @return void
     */
    public function created(Submission $submission)
    {
        //
    }

    /**
     * Handle the submission "updated" event.
     *
     * @param  \App\Submission  $submission
     * @return void
     */
    public function updated(Submission $submission)
    {
        $submission_log = SubmissionLog::create([
            'user_id' => auth('admin')->user()->id,
            'submission_id' => $submission->id,
            'role' => auth('admin')->user()->username,
            'activity' => request()->segment(5) ?? 'mengubah-nomor-surat',
            'method' => Request::method(),
            'url' => Request::fullUrl(),
            'ip' => Request::ip(),
            'agent' => Request::header('user-agent')
        ]);
    }

    /**
     * Handle the submission "deleted" event.
     *
     * @param  \App\Submission  $submission
     * @return void
     */
    public function deleted(Submission $submission)
    {
        //
    }

    /**
     * Handle the submission "restored" event.
     *
     * @param  \App\Submission  $submission
     * @return void
     */
    public function restored(Submission $submission)
    {
        //
    }

    /**
     * Handle the submission "force deleted" event.
     *
     * @param  \App\Submission  $submission
     * @return void
     */
    public function forceDeleted(Submission $submission)
    {
        //
    }
}
