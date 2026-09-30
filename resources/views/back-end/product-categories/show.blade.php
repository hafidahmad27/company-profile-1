@extends('layouts.back-end.app')

@section('title', 'Product Category')

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="disabledInput">Product Category</label>
                                    <p class="form-control-static" id="staticInput">{{ $productCategory->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
@endsection
