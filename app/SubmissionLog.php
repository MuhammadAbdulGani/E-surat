<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmissionLog extends Model
{
    protected $table = 'submission_logs';
    protected $guarded = [];

    public function getSubmissionAttribute($submissionId)
    {
    return $this->whereSubmissionId($submissionId)->with('Submission.Letter', 'Submission.User')->first();
    }

    /**
     * Get the Submission that owns the SubmissionLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class, 'submission_id');
    }
}
