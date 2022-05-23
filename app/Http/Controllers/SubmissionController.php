<?php

namespace App\Http\Controllers;

use Activity;
use App\Letter;
use App\Submission;
use App\SubmissionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = Submission::where('user_id', auth()->id())->get();

        return view('submissions', ['submissions' => $submissions]);
    }

    public function store($letter, Request $request)
    {
        $letter = Letter::find($letter);

        if (!$letter) {
            return back()->with([
                'status' => 'danger',
                'message' => 'Surat Belum Tersedia!'
            ]);
        }

        // Check if Letter from Staff is Exists!
        $submission = new Submission;
        $isActive = SubmissionIsFinish($letter->id);
        if ($isActive) {
            $submission->user_id = auth('web')->user()->id;
            $submission->letter_id = $letter->id;
            $submission->data = json_encode(array('header' => $request->header, 'body' => $request->body, 'footer' => $request->footer));
            $submission->approval_status = 0;
            $submission->save();
            Activity::add(['page' => 'Pengajuan Surat', 'description' => 'Mengajukan Surat Baru: ' . $letter->name]);
            return back()->with([
                'status' => 'success',
                'message' => 'Berhasil Mengajukan Surat! Mohon tunggu notifikasi via WhatsApp'
            ]);
        } 
        Activity::add(['page' => 'Pengajuan Surat', 'description' => 'Mengajukan Surat Gagal: '.$letter->name.' masih ada yang belum di proses']);
        return back()->with([
            'status' => 'info',
            'message' => 'Mengajukan Surat Gagal: <strong>'.$letter->name.'</strong> masih ada yang belum di proses'
        ]);
       

        // $response = Http::withHeaders(['Authorization' => config('whatsapp.token')])
        // ->asForm()
        // ->post('https://fonnte.com/api/send_message.php', [
        //     'phone' => setting('whatsapp'),
        //     'type' => 'text',
        //     'text' => 'Ada Pengajuan Surat Baru Oleh: ' . auth()->user()->name . ' Dan Surat Yang Diajukan Adalah: ' . $letter->name . '. Mohon Segera Ditinjau, Terimakasih. E-Surat Pemerintah Desa Busungbiu'
        // ]);

        // Activity::add(['page' => 'Pengajuan Surat', 'description' => 'Mengajukan Surat Baru: ' . $letter->name]);
    }
}
