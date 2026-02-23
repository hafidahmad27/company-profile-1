<div class="container-fluid bg-secondary text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-4">
                <h6>About</h6>
                <p class="small" style="text-align: justify">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque omnis quos, atque temporibus
                    illo
                    vel harum officiis dolor repellendus perferendis ipsa, eaque repellat veritatis placeat beatae.
                    Eaque saepe vero velit!
                </p>
            </div>
            <div class="col-md-4 col-sm-4 col-4 text-center">
                <h6>Informasi Umum</h6>
                <ul class="list-unstyled small">
                    @foreach ($pages as $page)
                        <li>
                            <a class="text-white text-decoration-none {{ $page->slug == 'index' ? request()->is('/') : request()->is($page->slug) }}"
                                href="{{ $page->slug == 'index' ? url('/') : url($page->slug) }}">{{ $page->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 col-4">
                <h6>Hubungi kami</h6>
                <ul class="list-unstyled small">
                    <li><a class="text-white text-decoration-none">5055 Feil Cape Apt. 883
                            Parkerchester, NC 09952-3279</a></li>
                    <li><a class="text-white text-decoration-none">012345678910</a></li>
                    <li><a class="text-white text-decoration-none">hfdcorp@test.com</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-dark text-white">
    <div class="row py-3">
        <center>
            © 2026 HFD Corp. All rights reserved.
        </center>
    </div>
</div>
