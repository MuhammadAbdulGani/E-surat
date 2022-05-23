<?php

namespace App\Observers;

use Request;
use App\SubmissionLog;
use App\SubmissionOut;

class SubmissionOutObserver
{
    /**
     * Handle the submission out "created" event.
     *
     * @param  \App\SubmissionOut  $submissionOut
     * @return void
     */
    public function created(SubmissionOut $submissionOut)
    {
        $submission_log = SubmissionLog::create([
            'user_id' => auth('admin')->user()->id,
            'submission_id' => $submissionOut->id,
            'role' => auth('admin')->user()->username,
            'activity' => request()->segment(5) ?? 'membuat-surat-keluar',
            'method' => Request::method(),
            'url' => Request::fullUrl(),
            'ip' => Request::ip(),
            'agent' => Request::header('user-agent')
        ]);
    }

    /**
     * Handle the submission out "updated" event.
     *
     * @param  \App\SubmissionOut  $submissionOut
     * @return void
     */
    public function updated(SubmissionOut $submissionOut)
    {
        //
    }

    /**
     * Handle the submission out "deleted" event.
     *
     * @param  \App\SubmissionOut  $submissionOut
     * @return void
     */
    public function deleted(SubmissionOut $submissionOut)
    {
        //
    }

    /**
     * Handle the submission out "restored" event.
     *
     * @param  \App\SubmissionOut  $submissionOut
     * @return void
     */
    public function restored(SubmissionOut $submissionOut)
    {
        //
    }

    /**
     * Handle the submission out "force deleted" event.
     *
     * @param  \App\SubmissionOut  $submissionOut
     * @return void
     */
    public function forceDeleted(SubmissionOut $submissionOut)
    {
        //
    }
}
