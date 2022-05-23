@extends('layouts.master')

@section('title', 'Home')

@section('content')
<!-- start page title -->
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Dashboard</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active">Selamat Datang di Dashboard
                    {{ config('app.name') }}, {{ auth()->user()->name }}!</li>
            </ol>
        </div>
    </div>
</div>
</div>
<!-- end page title -->
@if(!auth()->user()->phone_number)
<div class="row d-none">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Tambahkan Nomor Whatsapp</h4>
                <p class="card-title-desc">Dapatkan pemberitahun mengenai pengajuan surat melalui Whatsapp. ex: 6281234567890 (jika format salah, pesan tidak akan terkirim)</p>

                <form class="custom-validation" method="POST" action="{{ route('account.whatsapp') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-2 col-form-label">Nomor Whatsapp</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="phone_number" id="phone_number"
                                value="{{ old('phone_number', auth()->user()->phone_number ?? '628') }}" data-parsley-length="[5,255]" required>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Surat Keluar</h4>
                @include('components.message')
                <div id="accordion">
                    @component('components.letter', [
                        'letter_id' => request()->segment(4)
                    ])
                        
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Plugins js -->
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/form-editor.init.js')}}"></script>

@endsection
