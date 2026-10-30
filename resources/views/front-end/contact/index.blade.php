@extends('layouts.front-end.app')

@section('title', $section->title)

@section('content')
    {{-- <p class="text-center" style="text-align: justify">
        {{ $section->title ?? null }}
    </p> --}}

    <p class="text-center py-4" style="text-align: justify; font-size: 20pt">
        {{ $section->subtitle ?? null }}
    </p>

    <div class="row">
        <div class="col-md-7 col-sm-7">
            <div class="card bg-secondary p-4">
                <div class="card-body">
                    <h4 class="card-title text-light fw-bold mb-5">Contact Form</h4>
                    {{-- <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6> --}}
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <b>{!! session('success') !!}</b> <i class="bi bi-check-circle-fill"></i>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="col-md-6 col-6">
                                <div class="form-group mb-3 text-light">
                                    <label>Name</label>
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="form-group mb-3 text-light">
                                    <label>Email</label>
                                    <input type="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <div class="form-group mb-3 text-light">
                                    <label>Phone</label>
                                    <input type="number" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        min="0" placeholder="ex: 08xxx" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="form-group mb-3 text-light">
                                    <label>WhatsApp</label>
                                    <input type="number" id="whatsapp"
                                        class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp"
                                        min="0" placeholder="ex: 08xxx" value="{{ old('whatsapp') }}">
                                    @error('whatsapp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 text-light">
                                <label>Subject</label>
                                <input type="text" id="subject"
                                    class="form-control @error('subject') is-invalid @enderror" name="subject"
                                    placeholder="" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 text-light">
                                <label class="form-label">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" maxlength="255"
                                    rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-12 d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-lg btn-primary rounded-5 fw-bold">Submit Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-sm-5">
            <div class="card border-3 border-primary" style="text-align: justify">
                <div class="card-body p-4">
                    <div class="address d-flex align-items-start gap-3">
                        <button class="btn btn-primary btn-lg rounded-circle disabled">
                            <i class="bi bi-geo-alt-fill"></i>
                        </button>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{!! nl2br(e($companySetting->address ?? '-')) !!}</h6>
                    </div>
                    <div class="phone d-flex align-items-center gap-3 mt-3">
                        <button class="btn btn-primary btn-lg rounded-circle disabled">
                            <i class="bi bi-telephone-fill"></i>
                        </button>
                        <a class="d-block mb-2 text-decoration-none"
                            href="{{ $companySetting->phone_link }}">{{ $companySetting->phone ?? '-' }}</a>
                    </div>
                    <div class="email d-flex align-items-center gap-3 mt-3">
                        <button class="btn btn-primary btn-lg rounded-circle disabled">
                            <i class="bi bi-envelope-fill"></i>
                        </button>
                        <a class="d-block text-decoration-none"
                            href="{{ $companySetting->email_link }}">{{ $companySetting->email ?? '-' }}</a>
                    </div>
                </div>
            </div>

            @if ($companySetting->map_embed)
                <div class="card border-3 border-primary mt-3">
                    <div class="card-body">
                        {!! $companySetting->map_embed !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
