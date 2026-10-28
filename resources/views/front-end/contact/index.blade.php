@extends('layouts.front-end.app')

@section('title', $page->title)

@section('content')
    {{-- <p class="text-center" style="text-align: justify">
        {{ $section->title ?? null }}
    </p> --}}

    <p class="text-center fw-bold py-3" style="text-align: justify; font-size: 20pt">
        {{ $section->subtitle ?? null }}
    </p>

    <div class="row">
        <div class="col-md-7 col-sm-7">
            <div class="card bg-secondary border-3 border-primary rounded-4 p-3">
                <div class="card-body">
                    {{-- <h5 class="card-title fw-bold">Contact Form</h5> --}}
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
                                        placeholder="" value="{{ old('name', $page->name ?? null) }}" required autofocus>
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
                                        placeholder="" value="{{ old('email', $page->email ?? $page->user_email) }}"
                                        required>
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
                                        min="0" placeholder="" value="{{ old('phone', $page->phone ?? null) }}">
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
                                        min="0" placeholder=""
                                        value="{{ old('whatsapp', $page->whatsapp ?? null) }}">
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
                                    placeholder="" value="{{ old('subject', $page->subject ?? null) }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 text-light">
                                <label class="form-label">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" maxlength="255"
                                    rows="5" required>{{ old('message', $page->message ?? null) }}</textarea>
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
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="card border-3 border-primary rounded-4 text-center">
                        <div class="card-body">
                            <button class="btn btn-primary btn-lg rounded-circle disabled">
                                <i class="bi bi-geo-alt-fill"></i>
                            </button>
                            <h5 class="card-title mt-2">
                                Address
                            </h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{!! nl2br(e($companySetting->address ?? '-')) !!}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5">
                    <div class="card border-3 border-primary rounded-4 text-center">
                        <div class="card-body">
                            <button class="btn btn-primary btn-lg rounded-circle disabled">
                                <i class="bi bi-envelope-fill"></i>
                            </button>
                            <h5 class="card-title my-2">
                                Need Support?
                            </h5>
                            <h6 class="card-subtitle my-2">
                                <a class="text-body-secondary text-decoration-none"
                                    href="tel:{{ $companySetting->phone }}">{{ $companySetting->phone ?? '-' }}</a>
                            </h6>
                            <h6 class="card-subtitle">
                                <a class="text-body-secondary text-decoration-none"
                                    href="mailto:{{ $companySetting->email }}">{{ $companySetting->email ?? '-' }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            @if ($companySetting->map_embed)
                <div class="card border-3 border-primary rounded-4 mt-3 text-center">
                    <div class="card-body">
                        {!! $companySetting->map_embed !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
