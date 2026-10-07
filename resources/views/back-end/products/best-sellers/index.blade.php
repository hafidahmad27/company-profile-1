@extends('layouts.back-end.app')

@section('title', 'Product Best Sellers')

@push('styles')
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/compiled/css/table-datatable.css') }}">
@endpush

@section('content')
    <div class="card">
        {{-- <div class="card-header">
            
        </div> --}}
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! session('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th class="text-center">Is Best Seller?</th>
                        <th class="text-center">Last Updated By</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach ($bestSellers as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->name }}</td>
                            <td class="text-center">
                                <form action="{{ route('be.products.best-sellers.setBestSeller', $product->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="checkbox" {{ $product->is_best_seller ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>
                                {{ $product->user_name }}, at: <br>
                                {{ $product->updated_at?->format('d-m-Y H:i:s') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('mazer/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('mazer/assets/static/js/pages/simple-datatables.js') }}"></script>
@endpush
