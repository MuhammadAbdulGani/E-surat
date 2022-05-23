@extends('admin.layouts.master')

@section('title', 'Pengajuan Surat: Ditolak')

@section('css')
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/magnific-popup/magnific-popup.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!-- start page title -->
<div class="row align-items-center">
  <div class="col-sm-6">
    @component('admin.components.breadcumb')
      @slot('title') Surat Keluar @endslot
      @slot('li_1') {{ ucfirst(auth('admin')->user()->username) }} @endslot
    @endcomponent
  </div>
</div>
<!-- end page title -->

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">List Surat yang sudah disetujui Dir / Sekte</h4>
        @include('admin.components.message')
        <table id="datatable" class="table table-bordered dt-responsive nowrap"
          style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th>Waktu Pengajuan</th>
              <th>Nama</th>
              <th>Jenis Surat</th>
              <th>Persetujuan</th>
              <th>Waktu Persetujuan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data->get() as $submission)
            @if ($submission->flag == StatusSubmission::FLAG['in'])
              <tr>
                <td>{{ $submission->created_at->formatLocalized('%d %B %Y %H:%M') }}</td>
                <td>{{ $submission->user->name }}</td>
                <td>{{ $submission->letter->name }} - {{$submission->number}}</td>
                <td>{{ $submission->approval_at ? $submission->approval_at->formatLocalized('%d %B %Y %H:%M') : '-' }}</td>
                <td>{{ $submission->admin ? $submission->admin->name : '-' }}</td>
                <td>
                  <a class="btn btn-sm btn-info waves-effect waves-light"
                    href="{{ route('admin.submissions.show', $submission->id) }}" role="button"><i
                      class="mdi mdi mdi-eye-circle"></i> Detail</a>
                      @if (empty($submission->Out))
                        <a class="btn btn-sm btn-info waves-effect waves-light"
                      href="{{ route('admin.submissions.letter-out.create', $submission->id) }}" role="button"><i
                        class="mdi mdi mdi-square-edit-outline"></i> Buat Surat Keluar</a>
                      @endif
                </td>
              </tr>
            @endif

            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div> <!-- end col -->
</div> <!-- end row -->

@endsection

@section('script')

<!-- Plugins js -->
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/magnific-popup/magnific-popup.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/lightbox.init.js')}}"></script>

<script type="text/javascript">
  $(document).on('submit', '.form-delete', function (e) {
    var form = this;
    e.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#34c38f",
      cancelButtonColor: "#f46a6a",
      confirmButtonText: "Yes, delete it!"
    }).then(function (result) {
      if (result.value) {
        return form.submit();
      }
    });
  }); 
</script>

@endsection