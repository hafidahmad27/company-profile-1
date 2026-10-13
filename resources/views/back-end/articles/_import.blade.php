<!--Basic Modal -->
<div class="modal fade text-left @if ($errors->has('file')) show @endif" id="default" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true" @if ($errors->has('file')) style="display:block;" @endif>
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Import @yield('title')
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('be.articles.import') }}" method="POST" enctype="multipart/form-data"
                class="form">
                @csrf
                <div class="modal-body">
                    <input type="file" name="file" id="file"
                        class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <div class="form-group me-auto">
                        <a href="{{ route('be.articles.export', ['isTemplate' => 1]) }}">download
                            template</a>
                    </div>
                    <button type="submit" class="btn btn-outline-success ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block"><i class="bi bi-arrow-bar-up"></i> Import</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
