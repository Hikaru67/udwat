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
                @foreach ($data['books'] as $book)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-new-pro mb-30 text-center">
                        <div class="product-img">
                            <img src="{{$book->image}}" alt="">
                        </div>
                        <div class="product-caption">
                            <h3><a href="/books/{{$book->id}}">{{$book->title}}</a></h3>
                            <span>$</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if ($data['books']->lastPage() > 1)
                {{ $data['books']->render('vendor.pagination.bootstrap-4') }}
            @endif
        </div>
    </section>
    <!--  New Product End -->
  </main>
@endsection