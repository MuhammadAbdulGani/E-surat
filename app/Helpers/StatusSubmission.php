<?php

/**
 * Created by masfahri
 */

use App\Submission;
use App\Helpers\Role;
use App\Helpers\Activity;
use App\SubmissionOut;

class StatusSubmission 
{
    public const FLAG = [
        'out' => 'keluar',
        'in' => 'masuk'
    ];

    public const OUT = [
        'PENDING' => 1,
        'FINISH' => 2
    ];
    
}


/**
 * Action
 * Approve Susbmission by submission_id
 */
if (!function_exists('ApproveSubmissions')) {
    function ApproveSubmissions($submission_id)
    {
        $data = Submission::find($submission_id);
        if ($data->number != null) {
            switch (auth('admin')->user()->username) {
                case Role::ROLE_STAFF:
                    if ($data->approval_status == Role::STATUS_STAFF['FROM_SEKERTARIS_OR_DIREKTUR']) {
                        $data->approval_status = Role::STATUS_STAFF['TO_PT_PTN'];
                    }else{
                        $data->approval_status = Role::STATUS_STAFF['APPROVE'];
                    }
                    break;
    
                case Role::ROLE_DIR:
                    $data->approval_status = Role::STATUS_DIREKTUR['APPROVE'];
                    break;
    
                case Role::ROLE_SEKERTARIS:
                    $data->approval_status = Role::STATUS_SEKERTARIS['APPROVE'];
                    break;
    
                case Role::ROLE_DIRJEN:
                    $data->approval_status = Role::STATUS_DIRJEN['APPROVE'];
                    break;
    
                default:
                    return new Submission();
                    break;
            }
            $data->admin_id = auth('admin')->user()->id;
            $data->approval_at = now();
            $data->save();
            return $data;
        } return false;


    }
}

/**
 * Action
 * Decline Submisison by submission_id
 */
if (!function_exists('DeclineSubmissions')) {
    function DeclineSubmissions($submission_id)
    {
        $data = Submission::find($submission_id);
        if ($data->number != null) {
            switch (auth('admin')->user()->username) {
                case Role::ROLE_STAFF:
                    $data->approval_status = Role::STATUS_STAFF['REJECT'];
                    $data->save();
                    break;

                case Role::ROLE_DIR:
                    $data->approval_status = Role::STATUS_DIREKTUR['REJECT'];
                    $data->save();
                    break;

                case Role::ROLE_SEKERTARIS:
                    $data->approval_status = Role::STATUS_SEKERTARIS['REJECT'];
                    $data->save();
                    break;

                case Role::ROLE_DIRJEN:
                    $data->approval_status = Role::STATUS_DIRJEN['REJECT'];
                    $data->save();
                    break;

                default:
                    return new Submission();
                    break;
            }
            $data->admin_id = auth('admin')->user()->id;
            $data->approval_at = now();
            $data->save();
            return $data;
        } return false;
    }
}

/**
 * Filter Submission is Finish
 */
if (!function_exists('SubmissionIsFinish')) {
    function SubmissionIsFinish($letter_id) {
        $letters = Submission::where(
            [
                'user_id' => auth('web')->user()->id,
                'letter_id' => $letter_id,
            ]
        );
        if ($letters->exists()) {
            $letters_is_finish = $letters->whereapproval_status(99);
            if ($letters_is_finish->exists()) {
                return true;
            } return false;
        }
        return true;
    }
}

/**
 * Filter Submission is Pending
 */
if (!function_exists('PendingSubmissions')) {
    function PendingSubmissions()
    {
        switch (auth('admin')->user()->username) {
            case Role::ROLE_STAFF:
                return Submission::whereIn('approval_status', [Role::STATUS_STAFF['PENDING'], Role::STATUS_STAFF['FROM_SEKERTARIS_OR_DIREKTUR']])->with('user', 'letter', 'admin');
                break;

            case Role::ROLE_DIRJEN:
                return Submission::where('approval_status', Role::STATUS_DIRJEN['PENDING'])->with('user', 'letter', 'admin');
                break;

            case Role::ROLE_SEKERTARIS:
                return Submission::where('approval_status', Role::STATUS_SEKERTARIS['PENDING'])->with('user', 'letter', 'admin');
                break;

            case Role::ROLE_DIR:
                return Submission::where('approval_status', Role::STATUS_DIREKTUR['PENDING'])->with('user', 'letter', 'admin');
                break;

            default:
                return Submission::whereapproval_status([
                    Role::STATUS_STAFF['PENDING'],
                    Role::STATUS_DIRJEN['PENDING'],
                    Role::STATUS_SEKERTARIS['PENDING'],
                    Role::STATUS_DIREKTUR['PENDING']
                ])->with('user', 'letter', 'admin');
                break;
        }
    }
}

/**
 * Filter Submission is Approved
 */
if (!function_exists('ApprovedSubmissions')) {
    function ApprovedSubmissions()
    {
        switch (auth('admin')->user()->username) {
            case Role::ROLE_STAFF:
                return Submission::whereIn('appsroval_status', array(Role::STATUS_STAFF['APPROVE'], Role::STATUS_STAFF['TO_PT_PTN']))->with('user', 'letter', 'admin');
                break;

            case Role::ROLE_DIRJEN:
                return Submission::where('approval_status', Role::STATUS_DIRJEN['APPROVE'])->with('user', 'letter', 'admin');
                break;

            case Role::ROLE_SEKERTARIS:
                return Submission::where('approval_status', Role::STATUS_SEKERTARIS['APPROVE'])->with('user', 'letter', 'admin');
                break;

            case Role::ROLE_DIR:
                return Submission::where('approval_status', Role::STATUS_DIREKTUR['APPROVE'])->with('user', 'letter', 'admin');
                break;

            default:
                return Submission::whereapproval_status([
                    Role::STATUS_STAFF['APPROVE'],
                    Role::STATUS_DIRJEN['APPROVE'],
                    Role::STATUS_SEKERTARIS['APPROVE'],
                    Role::STATUS_DIREKTUR['APPROVE']
                ])->with('user', 'letter', 'admin');
                break;
        }
    }
}

/**
 * Filter Submission is Rejected
 */
if (!function_exists('RejectedSubmissions')) {
    function RejectedSubmissions()
    {
        switch (auth('admin')->user()->username) {
            case Role::ROLE_STAFF:
                return Submission::whereapproval_status(Role::STATUS_STAFF['REJECT'])->with('user', 'letter', 'admin');
                break;

            case Role::ROLE_DIRJEN:
                return Submission::where('approval_status', Role::STATUS_DIRJEN['REJECT'])->with('user', 'letter', 'admin');
                break;

            case Role::ROLE_SEKERTARIS:
                return Submission::where('approval_status', Role::STATUS_SEKERTARIS['REJECT'])->with('user', 'letter', 'admin');
                break;

            case Role::ROLE_DIR:
                return Submission::where('approval_status', Role::STATUS_DIREKTUR['REJECT'])->with('user', 'letter', 'admin');
                break;

            default:
                return Submission::whereapproval_status([
                    Role::STATUS_STAFF['REJECT'],
                    Role::STATUS_DIRJEN['REJECT'],
                    Role::STATUS_SEKERTARIS['REJECT'],
                    Role::STATUS_DIREKTUR['REJECT']
                ])->with('user', 'letter', 'admin');
                break;
        }
    }
}

