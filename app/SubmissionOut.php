<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmissionOut extends Model
{
    protected $table = 'submission_outs';
    protected $guarded = [];
    public $timestamps = false;


    /**
     * Get the Submission associated with the SubmissionOut
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class);
    }
}
