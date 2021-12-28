@extends('layouts.default')

@section('title')
  <title>Homt | BMT</title>
@endsection

@section('content')
  <main>
    <!-- ? New Product Start -->
    <section class="new-product-area section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle mb-70">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-new-pro mb-30 text-center">
                        <div class="product-img">
                            <img src="assets/img/gallery/new_product1.png" alt="">
                        </div>
                        <div class="product-caption">
                            <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                            <span>$ 45,743</span>
                        </div>
                    </div>
                </div>
            </div>
            @if ($data['books']->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($data['books']->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $data['books']->url(1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $data['books']->lastPage(); $i++)
                        <li class="{{ ($data['books']->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $data['books']->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($data['books']->currentPage() == $data['books']->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $data['books']->url($data['books']->currentPage()+1) }}" >Next</a>
                    </li>
                </ul>
            @endif
        </div>
    </section>
    <!--  New Product End -->
  </main>
@endsection