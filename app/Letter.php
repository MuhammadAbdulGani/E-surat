<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Letter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'content', 'data', 'status'
    ];

    public function status()
    {
        return $this->status == 'On' ? 'Aktif' : 'Tidak Aktif';
    }

    public function getData()
    {
        return json_decode($this->data);
    }

    /**
     * Get the Submission associated with the Letter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function SubmissionByUserID($user_id): HasOne
    {
        return $this->hasOne(Submission::class);
    }
}
