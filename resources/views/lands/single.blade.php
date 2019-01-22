@extends('wrapper')
@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>{{ $land->name }}</h1>
                <h2><a href="index.html">Home </a> &nbsp;/&nbsp; Property Details</h2>
            </div>
        </div>
    </section>

    <!-- START SECTION PROPERTIES LISTING -->
    <section class="blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 blog-pots">
                    <!-- Block heading Start-->
                    <div class="block-heading details">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-4">
                                <h4>
                            <span class="heading-icon">
                                <i class="fa fa-map-marker"></i>
                                </span>
                                    <span class="hidden-sm-down local-address">{{ $land->locality->region->name }}, {{ $land->locality->name }}</span>
                                </h4>
                            </div>
                            <div class="col-lg-4 col-md-4 col-8 cod-pad">
                                <div class="sorting-options">
                                    <h5><span>Цена:</span> {{ number_format($land->price, 0, '', ' ') }} <i class="fa fa-ruble"></i></h5>
                                    <h6 class="type"><span>Тип:</span> {{ $land->type->name }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Block heading end -->
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                               {{-- <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                </ol>--}}
                                <div class="carousel-inner" role="listbox">
                                    @if(!empty($land->images[0]->img_link))
                                        @foreach($land->images as $image)
                                        <div class="carousel-item {{ ($loop->iteration == 1) ? 'active' : '' }}">
                                            <img class="d-block img-fluid" src="{{ asset($image->img_link) }}" alt="{{ $land->name }}">
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <img class="d-block img-fluid" src="{{ asset('images/lands/land_single_placeholder.jpg') }}" alt="no image">
                                        </div>
                                    @endif
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="blog-info details">
                                <!-- cars content -->
                                <div class="homes-content details-2 mb-5">
                                    <!-- cars List -->
                                    <ul class="homes-list clearfix list-of-properties">
                                        <li data-placement="left" data-toggle="tooltip" title="Площадь">
                                            <img class="img-properties mr-2" src="{{ asset('svg/land.svg') }}">
                                            <span>{{ $land->area }}</span>
                                        </li>
                                        <li data-placement="left" data-toggle="tooltip" title="Категория земли">
                                            <img class="img-properties mr-2" src="{{ asset('svg/land-category.svg') }}">
                                            <span>{{ $land->land_category->name }}</span>
                                        </li>
                                        <li data-placement="left" data-toggle="tooltip" title="Назначение земли">
                                            <img class="img-properties mr-2" src="{{ asset('svg/assignment.svg') }}">
                                            <span>{{ $land->assignment->name }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <h5 class="mb-4">Общая Информация</h5>
                                <p>{!! $land->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="property-location mb-5">
                        <h5>Местонахождения</h5>
                        <div class="divider-fade"></div>
                        <div id="map-contact" class="contact-map"></div>
                    </div>
                </div>
                <aside class="col-lg-3 col-md-12 car">
                    <div class="widget">
                        <div class="recent-post py-5">
                            <h5 class="font-weight-bold mb-4">Похожие участки</h5>
                            <div class="recent-main">
                                <div class="recent-img">
                                    <a href="blog-details.html"><img src="{{ asset('images/feature-properties/fp-1.jpg') }}" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="blog-details.html"><h6>Family Home</h6></a>
                                    <p>$230,000</p>
                                </div>
                            </div>
                            <div class="recent-main my-4">
                                <div class="recent-img">
                                    <a href="blog-details.html"><img src="{{ asset('images/feature-properties/fp-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="blog-details.html"><h6>Family Home</h6></a>
                                    <p>$230,000</p>
                                </div>
                            </div>
                            <div class="recent-main">
                                <div class="recent-img">
                                    <a href="blog-details.html"><img src="{{ asset('images/feature-properties/fp-3.jpg') }}" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="blog-details.html"><h6>Family Home</h6></a>
                                    <p>$230,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->
@endsection