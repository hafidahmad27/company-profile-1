@extends('layouts.back-end.app')

@section('title', 'Article')

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
                            @include('back-end.articles._form', [
                                'action' => route('be.articles.update', $article->id),
                                'method' => 'PUT',
                                'submitLabel' => '<i class="bi bi-arrow-repeat"></i> Update',
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
@endsection
