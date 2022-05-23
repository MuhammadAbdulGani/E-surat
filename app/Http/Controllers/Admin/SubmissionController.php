<?php

namespace App\Http\Controllers\Admin;

use Excel;
use Activity;
use App\Signatory;
use App\Submission;
use App\Signatories;
use StatusSubmission;
use App\SubmissionLog;
use App\SubmissionOut;
use Illuminate\Http\Request;
use App\Exports\SubmissionsExport;
use App\Helpers\Role as CheckRole;
use App\Services\SubmissionService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class SubmissionController extends Controller
{
    public function pending()
    {
        $submissions = Submission::with('user', 'letter')
        ->where('approval_status', 0)
        ->get();
        return view('admin.submission.pending', ['submissions' => $submissions]);
    }

    public function approved()
    {
        $submissions = Submission::with('user', 'letter', 'admin')
        ->where('approval_status', 1)
        ->get();

        return view('admin.submission.approved', ['submissions' => $submissions]);
    }

    public function rejected()
    {
        $submissions = Submission::with('user', 'letter', 'admin')
        ->where('approval_status', 2)
        ->get();

        return view('admin.submission.rejected', ['submissions' => $submissions]);
    }

    public function letterOut()
    {
        $data = Submission::with('logs', 'user', 'letter', 'admin')->whereApprovalStatus(CheckRole::STATUS_STAFF['LETTER_OUT']);
        return CheckRole::STAFF() ? view('admin.submission.letter-out.index', ['data' => $data]) : view('errors.403', ['exception' => 'Gaada Akses Bos']);
    }

    public function letterOutCreate()
    {
        return view('admin.submission.letter-out.create');
    }

    public function letterOutStore(Request $request)
    {
        $request['letter_id'] = 6;
        $submission = Submission::whereIdAndApprovalStatus($request->segment(4), CheckRole::STATUS_STAFF['TO_PT_PTN']);
        if (!$submission->exists()) {
            Activity::add(['page' => 'surat-keluar', 'description' => auth('admin')->user()->username.' Mencoba Membuat Surat Keluar: '.$submission->first()->number]);
            return redirect()->back()->with([
                'status' => 'info',
                'message' => 'Surat Di Setujui oleh beberapa Pihak: '
            ]);
        }
        $submission = SubmissionOut::updateOrCreate([
            'submission_id' => $submission->first()->id,
            'number' => $request->number ?: $submission->first()->number,
            'approval_status' => StatusSubmission::OUT['PENDING'],
        ], [
            'submission_id' => $submission->first()->id,
            'number' => $request->number ?: $submission->first()->number,
            'data' => json_encode(array('header' => $request->header, 'body' => $request->body, 'footer' => $request->footer)),
            'approval_status' => StatusSubmission::OUT['PENDING'],
            'approval_at' => now(),
        ]);
        Activity::add(['page' => 'surat-keluar', 'description' => auth('admin')->user()->username.' Berhasil Membuat Surat Keluar: '.$submission->first()->number]);
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Surat Berhasil dibuat & Dikeluarkan: '
        ]);
        
    }

    public function show($id)
    {
        $submission = Submission::find($id);
        $signatories = Signatory::all();
        $nomor_surat = date('dmy');

        return view('admin.submission.show', ['submission' => $submission, 'signatories' => $signatories, 'nomor_surat' => $nomor_surat]);
    }

    public function status($id, $status)
    {
        if ($status == 'approve') {
            $submission = ApproveSubmissions($id);
            $route = route('admin.submissions.approved');
        }else{
            $submission = DeclineSubmissions($id);
            $route = route('admin.submissions.rejected');
        }

        if ($submission) {
            $message = 'Pengajuan '. $submission->letter->name . ' oleh: ' . $submission->user->name . ' telah disetujui. Silakan datang ke Kantor dengan Menggunakan Masker!';
            Activity::add([
                'page' => 'Warga', 
                'description' => $message
            ]);
            return redirect($route)->with([
                'status' => 'success',
                'message' => $message
            ]);
        } 
        Activity::add(['page' => auth('admin')->user()->username, 'description' => 'Nomor Surat Belum Diisi: ']);
        return redirect()->back()->with([
            'status' => 'info',
            'message' => 'Nomor Surat Belum Diisi: '
        ]);

        // $response = Http::withHeaders(['Authorization' => config('whatsapp.token')])
        // ->asForm()
        // ->post('https://fonnte.com/api/send_message.php', [
        //     'phone' => $submission->user->phone_number,
        //     'type' => 'text',
        //     'text' => $message
        // ]);


    }

    public function update(Request $request, $id)
    {
        $submission = Submission::find($id);
        $submission->number = $request->number;
        $submission->save();

        Activity::add(['page' => 'Warga', 'description' => 'Berhasil Memperbarui Pengajuan Surat: #' . $id]);

        return back()->with([
            'status' => 'success',
            'message' => 'Memperbarui Pengajuan Surat: #' . $id
        ]);
    }

    public function exportApproved()
    {
        return Excel::download(new SubmissionsExport, 'Surat Yang Disetujui ' . now()->format('d-M-Y') . '.xlsx');
    }

    public function print($id, Request $request)
    {
        $submission = Submission::find($id);

        $signatory_id = $request->signatory ?? setting('signatory_active');
        $signatory = Signatory::find(2);

        $data['signatory_name'] = $signatory->name;
        $data['signatory_position'] = $signatory->position;
        $data['on_behalf'] = $signatory_id != 1 ? 'A/N, Perbengkel ' . ucwords(strtolower(setting('village'))) : '';

        foreach ($submission->user->toArray() as $key => $value) {
            $data[$key] = $value;
        }

        $data['ttl'] = $submission->user->getPsb();
        $data['tgl'] = now()->formatLocalized('%d %B %Y');
        $data['districts'] = ucwords(strtolower(setting('districts')));
        $data['sub-districts'] = ucwords(strtolower(setting('sub-districts')));
        $data['village'] = ucwords(strtolower(setting('village')));

        foreach (json_decode($submission->data) as $key => $value) {
            $data[$key] = $value;
        }

        $content = $submission->letter->content;
        foreach ($data as $key => $value) {
            $content = str_replace('[' . $key . ']', $value, $content);
        }
        return view('admin.print.template', ['submission' => $submission, 'content' => $content, 'signature' => $signatory]);
    }
    
    public function disposisi(SubmissionLog $submissionLog, $id)
	{
		$submission = Submission::find($id);
        $log = $submission->logs;
        $signature = Signatory::find(2);
		return view('admin.print.disposisi', [
			'submission' => $submission,
            'log' => $log,
            'signature' => $signature
		]);
	}
}
