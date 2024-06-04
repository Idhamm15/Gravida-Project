
<!-- Services Start -->
<div class="container-fluid services py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 800px;">
            <p class="fs-4 text-uppercase text-center text-primary">Artikel</p>
            <h1 class="display-3">Artikel Edukasi Ibu Hamil</h1>
        </div>
        @php
            use Illuminate\Support\Str;
        @endphp

        <div class="row g-4">
            @foreach ($artikels as $index => $artikel)
                @if ($index % 2 == 0)
                    <div class="col-lg-6">
                        <div class="services-item bg-light border-4 border-end border-primary rounded p-4">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="services-content text-end">
                                        <h3>{{ $artikel->name }}</h3>
                                        <p>{{ Str::limit($artikel->description, 20) }}</p>
                                        <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-primary btn-primary-outline-0 rounded-pill py-2 px-4">Baca Selengkapnya</a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="services-img d-flex align-items-center justify-content-center rounded">
                                        <img src="{{ url('images/'.$artikel->image) }}" class="img-fluid rounded" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-6">
                        <div class="services-item bg-light border-4 border-start border-primary rounded p-4">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="services-img d-flex align-items-center justify-content-center rounded">
                                        <img src="{{ url('images/'.$artikel->image) }}" class="img-fluid rounded" alt="">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="services-content text-start">
                                        <h3>{{ $artikel->name }}</h3>
                                        <p>{{ Str::limit($artikel->description, 20) }}</p>
                                        <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-primary btn-primary-outline-0 rounded-pill py-2 px-4">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- <div class="col-12">
                <div class="services-btn text-center">
                    <a href="#" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-5">Service More</a>
                </div>
            </div> --}}
        </div>

    </div>
</div>
<!-- Services End -->