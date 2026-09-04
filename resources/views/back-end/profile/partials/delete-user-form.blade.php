<div class="page-heading">
    <div class="page-title">
        <div class="row">
            {{-- <div class="col-12 col-md-6 order-md-1 order-last"> --}}
            <h3>Delete Account</h3>
            <p class="text-subtitle text-muted">
                Once your account is deleted, all of its resources and data will be permanently deleted. Before
                deleting
                your account, please download any data or information that you wish to retain.
            </p>
            {{-- </div> --}}
        </div>
    </div>
</div>
{{-- <div class="col-12 col-md-12 d-flex justify-content-center mt-4"> --}}
<button type="button" class="btn btn-danger block" data-bs-toggle="modal" data-bs-target="#default">
    <i class="bi bi-trash"></i> Delete Account
</button>
{{-- </div> --}}

<!--Basic Modal -->
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Are you sure you want to delete your account?</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('be.profile.destroy') }}" method="POST" enctype="multipart/form-data"
                class="form">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please
                        enter
                        your password to confirm you would like to permanently delete your account.</p>
                    {{-- <label for="password">Password: </label> --}}
                    <div class="form-group">
                        <input id="password" name="password" type="password" placeholder="Password"
                            class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Cancel</span>
                    </button>
                    <button type="submit" class="btn btn-outline-danger ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Delete Account</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
