@extends('front-end.layouts.app')

@section('title', 'Products')

@section('content')
    <h2 class="pt-4">Products</h2>
    <hr>
    <p class="mt-4" style="text-align: justify">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam fuga incidunt adipisci voluptate saepe,
        iste provident eius in quod itaque veritatis obcaecati cum natus accusamus dolorum perspiciatis qui
        consequuntur molestias.
    </p>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="category-1-tab" data-bs-toggle="tab" data-bs-target="#category-1-tab-pane"
                type="button" role="tab" aria-controls="category-1-tab-pane" aria-selected="true">Category 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="category-2-tab" data-bs-toggle="tab" data-bs-target="#category-2-tab-pane"
                type="button" role="tab" aria-controls="category-2-tab-pane" aria-selected="true">Category
                2</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="category-3-tab" data-bs-toggle="tab" data-bs-target="#category-3-tab-pane"
                type="button" role="tab" aria-controls="category-3-tab-pane" aria-selected="true">Category
                3</button>
        </li>
        {{-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane"
                    type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false"
                    disabled>Disabled</button>
            </li> --}}
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="category-1-tab-pane" role="tabpanel" aria-labelledby="category-1-tab"
            tabindex="0">
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-0">
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/300x200/light/blue" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Category 1 Card title 1</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/300x200/light/blue" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Category 1 Card title 2</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/300x200/light/blue" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Category 1 Card title 3</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This card has even longer content than the first to show that equal height
                                action.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="category-2-tab-pane" role="tabpanel" aria-labelledby="category-2-tab" tabindex="0">
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-0">
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/300x200/light/blue" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Category 2 Card title 1</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/300x200/light/blue" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Category 2 Card title 2</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/300x200/light/blue" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Category 2 Card title 3</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This card has even longer content than the first to show that equal height
                                action.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="category-3-tab-pane" role="tabpanel" aria-labelledby="category-3-tab"
            tabindex="0">
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-0">
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/300x200/light/blue" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Category 3 Card title 1</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/300x200/light/blue" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Category 3 Card title 2</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/300x200/light/blue" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Category 3 Card title 3</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This card has even longer content than the first to show that equal height
                                action.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                ...
            </div> --}}
    </div>
@endsection
