<!-- SCRIPTS GLOBAL -->
<script src="{{ asset('mazer/assets/static/js/initTheme.js') }}"></script>
<script src="{{ asset('mazer/assets/static/js/components/dark.js') }}"></script>
<script src="{{ asset('mazer/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('mazer/assets/compiled/js/app.js') }}"></script>

@if ($errors->has('file'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById('default'));
            modal.show();
        });
    </script>
@endif
