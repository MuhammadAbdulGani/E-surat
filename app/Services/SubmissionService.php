<?php

namespace App\Services;

use App\Submission;
use App\Helpers\Role;

class SubmissionService
{

    public static function handleUpdateStatusbyRole($submission_id)
    {
        switch (auth('admin')->user()->username) {
            case Role::ROLE_DIR:
                $submission = Submission::find($submission_id);
                $submission->approval_status = 1; //Approved by DIR
                $submission->approval_at = now();
                $submission->admin_id = auth('admin')->user()->id;
                $submission->save();
                return $submission;
                break;

            case Role::ROLE_SEKERTARIS:
                $submission = Submission::find($submission_id);
                $submission->approval_status = 2; //Approved by Sekertaris
                $submission->approval_at = now();
                $submission->admin_id = auth('admin')->user()->id;
                $submission->save();
                return $submission;
                break;

            case Role::ROLE_DIRJEN:
                $submission = Submission::find($submission_id);
                $submission->approval_status = 3; //Approved by Dirjen
                $submission->approval_at = now();
                $submission->admin_id = auth('admin')->user()->id;
                $submission->save();
                return $submission;
                break;

            default:
                return null;
                break;
        }
    }

    public function handleUpdateStatusbyRequest($submission_id)
    {
        switch (auth('admin')->user()->username) {
            case Role::ROLE_DIR:
                $submission = Submission::find($submission_id);
                $submission->approval_status = 1; //Approved by DIR
                $submission->approval_at = now();
                $submission->admin_id = auth('admin')->user()->id;
                $submission->save();
                return $submission;
                break;

            case Role::ROLE_SEKERTARIS:
                $submission = Submission::find($submission_id);
                $submission->approval_status = 2; //Approved by Sekertaris
                $submission->approval_at = now();
                $submission->admin_id = auth('admin')->user()->id;
                $submission->save();
                return $submission;
                break;

            case Role::ROLE_DIRJEN:
                $submission = Submission::find($submission_id);
                $submission->approval_status = 3; //Approved by Dirjen
                $submission->approval_at = now();
                $submission->admin_id = auth('admin')->user()->id;
                $submission->save();
                return $submission;
                break;

        default:
            return null;
            break;
    }
}
