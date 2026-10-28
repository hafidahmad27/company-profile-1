@extends('layouts.back-end.app')

@section('title', 'Contact Messages')

@push('styles')
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/compiled/css/table-datatable.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th style="width: 10%">Message</th>
                        <th>Email / Phone / WA</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach ($contactMessages as $contactMessage)
                        <tr class="bg-{{ $contactMessage->is_read ? '' : 'success' }}">
                            <td>{{ ++$i }}</td>
                            <td align="center">
                                {{ $contactMessage->created_at?->locale('id')->translatedFormat('d M Y, H:i') ?? 'null' }}
                            </td>
                            <td>{{ $contactMessage->name ?? '-' }}</td>
                            <td align="justify" class="fw-bold">{{ $contactMessage->subject_headline ?? '-' }}</td>
                            <td align="justify">{{ Str::limit($contactMessage->message, 40) ?? '-' }}</td>
                            <td>
                                {{ $contactMessage->email ?? '-' }} <br>
                                {{ $contactMessage->phone ?? '-' }} <br>
                                {{ $contactMessage->whatsapp ? $contactMessage->whatsapp . ' (WA)' : '-' }}
                            </td>
                            <td align="center">
                                <span class="badge text-bg-{{ $contactMessage->is_read ? 'primary' : 'warning' }}">
                                    {{ $contactMessage->is_read ? 'Read' : 'Unread' }}
                                </span>
                                @if ($contactMessage->is_read == 1)
                                    <span style="font-size: 9pt">
                                        {{ $contactMessage->user_name }} <br>
                                        {{ $contactMessage->updated_at?->format('d-m-Y H:i:s') ?? 'null' }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('be.contact-messages.show', $contactMessage->id) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@prepend('scripts')
    <script src="{{ asset('mazer/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('mazer/assets/static/js/pages/simple-datatables.js') }}"></script>
@endprepend
