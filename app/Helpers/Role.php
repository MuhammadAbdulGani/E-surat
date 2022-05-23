<?php

namespace App\Helpers;

use App\Submission;

class Role
{
    public const ROLE_DIR = 'dir';
    public const ROLE_SEKERTARIS = 'sekertaris';
    public const ROLE_DIRJEN = 'dirjen';
    public const ROLE_PT = 'pt';
    public const ROLE_PN = 'pn';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_STAFF = 'staff';

    public const PENDING_STAFF = 0;
    public const PENDING_DIRJEN = 1;
    public const PENDING_SEKERTARIS = 2;
    public const PENDING_DIR = 3;

    public const APPROVE_STAFF = 1;
    public const APPROVE_DIRJEN = 2;
    public const APPROVE_SEKERTARIS = 3;
    public const APPROVE_DIR = 4;

    public const REJECT_STAFF = 11;
    public const REJECT_DIRJEN = 12;
    public const REJECT_SEKERTARIS = 13;
    public const REJECT_DIR = 14;

    public const FINISH_STAFF = 111;
    public const FINISH_DIRJEN = 112;
    public const FINISH_SEKERTARIS = 113;
    public const FINISH_DIR = 114;


    /** Status Staff (Kalo pending blablabla) */
    public const STATUS_STAFF = 
    [
        'PENDING' => 0,
        'APPROVE' => 1,
        'REJECT' => 11,
        'FINISH' => 111,
        'FROM_SEKERTARIS_OR_DIREKTUR' => 3,
        'TO_PT_PTN' => 99,
        'LETTER_OUT' => 99
    ];

    /** Status Dirjen (Kalo pending blablabla) */
    public const STATUS_DIRJEN = [
        'PENDING' => 1,
        'APPROVE' => 2,
        'REJECT' => 12,
        'FINISH' => 112
    ];

    /** Status Sekertaris (Kalo pending blablabla) */
    public const STATUS_SEKERTARIS = [
        'PENDING' => 2,
        'APPROVE' => 3,
        'REJECT' => 13,
        'FINISH' => 113
    ];

    /** Status Direktur (Kalo pending blablabla) */
    public const STATUS_DIREKTUR = [
        'PENDING' => 2,
        'APPROVE' => 3,
        'REJECT' => 13,
        'FINISH' => 113
    ];


    public static function DIR()
    {
        return auth('admin')->user()->username == SELF::ROLE_DIR;
    }

    public static function SEKERTARIS()
    {
        return auth('admin')->user()->username == SELF::ROLE_SEKERTARIS;
    }

    public static function DIRJEN()
    {
        return auth('admin')->user()->username == SELF::ROLE_DIRJEN;
    }

    public static function PT()
    {
        return auth('admin')->user()->username == SELF::ROLE_PT;
    }

    public static function PN()
    {
        return auth('admin')->user()->username == SELF::ROLE_PN;
    }

    public static function ADMIN()
    {
        return auth('admin')->user()->username == SELF::ROLE_ADMIN;
    }

    public static function STAFF()
    {
        return auth('admin')->user()->username == SELF::ROLE_STAFF;
    }

}
