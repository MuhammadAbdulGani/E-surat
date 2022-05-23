<div class="card-body">
    <form class="custom-validation" method="POST" action="{{ route('admin.submissions.letter-out.store', $letter_id) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="header">Header</label>
            <textarea id="elm" name="header" required>
                {!! (App\SubmissionOut::whereSubmissionId($letter_id)->exists()) ? json_decode(App\SubmissionOut::whereSubmissionId($letter_id)->first()->data)->header : Format::TemplateHeader() !!}
            </textarea>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea id="elm" name="body" required>
                {!! (App\SubmissionOut::whereSubmissionId($letter_id)->exists()) ? json_decode(App\SubmissionOut::whereSubmissionId($letter_id)->first()->data)->body : Format::TemplateBody() !!}

            </textarea>
        </div>
        <div class="form-group">
            <label for="footer">Footer</label>
            <textarea id="elm" name="footer" required>
                {!! (App\SubmissionOut::whereSubmissionId($letter_id)->exists()) ? json_decode(App\SubmissionOut::whereSubmissionId($letter_id)->first()->data)->footer : Format::TemplateFooter() !!}
            </textarea>
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
    