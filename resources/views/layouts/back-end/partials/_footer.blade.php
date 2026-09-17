<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="row align-items-center py-3">
            <div class="col">
                Copyright &copy; {{ date('Y') }}
                {{ $companySetting->name ?? '-' }}.
                All Rights Reserved.
            </div>
            {{-- <div class="col text-center">

            </div> --}}
            <div class="col text-end">
                <span class="text-secondary">
                    Developed by HFD Dev | Template by
                    <span class="text-danger">
                        <i class="bi bi-heart-fill icon-mid"></i>
                    </span>
                    <a href="https://saugi.me">Saugi</a>
                </span>
            </div>
        </div>
    </div>
</footer>
