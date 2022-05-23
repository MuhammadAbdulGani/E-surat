<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Submission extends Model
{
    // protected $fillable = [
    //     'number', 'letter_id', 'data'
    // ];
    protected $guarded = [];

    protected $casts = [
        'approval_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function letter()
    {
        return $this->belongsTo('App\Letter');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function logs()
    {
        return $this->hasMany('App\SubmissionLog');
    }
    
    /**
     * Get the Out associated with the Submission
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Out(): HasOne
    {
        return $this->hasOne(SubmissionOut::class);
    }

    public function getStatus()
    {
        switch ($this->approval_status) {
            case 0:
                return 'Menunggu Persetujuan';
                break;
            case 1:
                return 'Disetujui';
                break;
            case 2:
                return 'Ditolak';
                break;

            default:
                return 'Tidak Diketahui';
                break;
        }
    }

    public function getData($name)
    {
        $json = json_decode($this->data);

        $data = [];
        foreach($json as $key => $val){
            $data[$key] = $val;
        }

        return $data[$name];
    }
}
