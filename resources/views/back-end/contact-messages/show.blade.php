@extends('layouts.back-end.app')

@section('title', 'Contact Message')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <div class="col-sm-9">
                    <h5 class="mb-0" style="text-align: justify">
                        {{ $contactMessage->subject_headline ?? '-' }}
                    </h5>
                </div>
                <div class="col-sm-2 ms-auto">
                    <h6>
                        {{ $contactMessage->created_at?->locale('id')->translatedFormat('d M Y, H:i') ?? '-' }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-sm-2">Name</label>
                <div class="col-sm-10">
                    <p class="card-text"> :
                        {{ $contactMessage->name ?? '-' }}
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2">Email</label>
                <div class="col-sm-10">
                    <p class="card-text"> :
                        <a href="{{ $contactMessage->email_link }}">{{ $contactMessage->email ?? '-' }}</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2">Phone / WA</label>
                <div class="col-sm-10">
                    <p class="card-text"> :
                        <a href="{{ $contactMessage->phone_link }}">
                            {{ $contactMessage->phone }}
                        </a>{{ $contactMessage->phone ? '' : '-' }}
                        /
                        <a href="{{ $contactMessage->whatsapp_link }}" target="_blank">
                            {{ $contactMessage->whatsapp }}
                        </a>
                        {{ $contactMessage->whatsapp ? ' (WA)' : '-' }}
                    </p>
                </div>
            </div>

            <hr>

            <div class="col-sm-11 mt-3">
                <p style="text-align: justify">
                    {!! nl2br(e($contactMessage->message ?? '-')) !!}
                </p>
            </div>

            <hr>

            <a href="{{ $contactMessage->email_link }}" class="btn btn-primary"><i class="bi bi-reply-fill"></i> Reply</a>
        </div>
    </div>
@endsection
