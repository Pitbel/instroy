@extends('wrapper')
@section('content')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>{{ $catName }}</h1>
            <h2><a href="index.html">Home </a> &nbsp;/&nbsp; List Right Sidebar</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION PROPERTIES LISTING -->
<section class="properties-right list featured portfolio blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 blog-pots">
                <!-- Block heading Start-->
                <div class="block-heading">
                    <div class="row">
                        <div class="col-lg-6 col-md-5 col-2">
                            <h4>
                                <span class="heading-icon">
                                <i class="fa fa-th-list"></i>
                                </span>
                                <span class="hidden-sm-down">Список участков</span>
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-7 col-10 cod-pad">
                            <div class="sorting-options">
                                <select class="sorting price" name="price_sort">
                                    <option value="asc" @if(isset($sortBy) && $sortBy == 'asc') selected @endif>Цена: По возрастанию</option>
                                    <option value="desc" @if(isset($sortBy) && $sortBy == 'desc') selected @endif>Цена: По убыванию</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Block heading end -->
                @php $num = 1; @endphp
                @if($num % 2)
                <div class="row">
                    @forelse($lands as $land)
                    <div class="item col-lg-6 col-md-6 col-xs-12 landscapes sale">
                        <div class="project-single">
                            <div class="project-inner project-head">
                                <div class="project-bottom">
                                    <h4><a href="{{ route('single-land', $land->id) }}">Подробнее...</a><span class="category"></span></h4>
                                </div>
                                @foreach($land->images as $image)
                                    <div class="button-effect">
                                        <a href="{{ route('single-land', $land->id) }}" class="btn" title="Подробнее"><i class="fa fa-link"></i></a>
                                        <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" title="Просмотр видео" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                        <a class="img-poppu btn" href="{{ asset($image->img_link) }}"
                                           data-rel="lightcase:myCollection"
                                           data-lc-categories="myCategory{{ $land->id }}"
                                           data-lc-caption="{{ $land->name }}"><i class="fa fa-photo"></i></a>
                                    </div>
                                @endforeach
                                <div class="homes">
                                    <!-- homes img -->
                                    <div class="homes-tag button alt featured">{{ $land->category->name }}</div>
                                    <div class="homes-tag button alt sale">{{ $land->type->name }}</div>
                                    <div class="homes-price">{{ $land->locality->name }}</div>
                                    <img src="{{ isset($land->images[0]) ? asset($land->images[0]->img_link) : asset('images/lands/placeholder.jpg') }}" alt="home-1" class="img-responsive">
                                </div>
                            </div>
                            <!-- homes content -->
                            <div class="homes-content">
                                <!-- homes address -->
                                <h3 class="title"><a class="land-title" href="{{ route('single-land', $land->id) }}">{{ $land->name }}</a></h3>
                                <p class="homes-address mb-3">
                                    <i class="fa fa-map-marker"></i><span>{{ $land->address }}</span>
                                </p>
                                <!-- homes List -->
                                <ul class="homes-list clearfix">
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
                                <!-- Price -->
                                <div class="price-properties">
                                    <h3 class="title mt-3">
                                        {{ number_format($land->price, 0, '', ' ') }} <i class="fa fa-ruble"></i>
                                    </h3>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-user"></i> ООО «Инстрой»
                                    <span>
                                        <i class="fa fa-calendar"></i> {{ ($land->created_at->diff(now())->days < 1) ? $land->created_at->diffForHumans() : $land->created_at->format('d.m.Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                        @php $num++; @endphp
                    @empty
                        1
                    @endforelse
                </div>
                @endif
            </div>
            <aside class="col-lg-3 col-md-12 car">
                <div class="widget">
                    <div class="section-heading">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="media-body">
                                <h5>Поиск участков</h5>
                                <div class="border"></div>
                                <p>Найти нужный участок</p>
                            </div>
                        </div>
                    </div>
                    <!-- Search Fields -->
                    <form method="get" action="{{ route('lands') }}">
                        <div class="main-search-field">
                            <h5 class="title">Фильтр</h5>
                            <div class="at-col-default-mar">
                                <select name="region">
                                    <option value="">Все районы</option>
                                    @foreach($regions as $region)
                                        <optgroup label="{{ $region->name }}" data-i="{{ $loop->iteration }}">
                                            @foreach($region->localities as $locality)
                                                <option {{ ($request->has('region') && $request->region == $locality->id) ? 'selected' : '' }} value="{{ $locality->id }}">{{ $locality->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="at-col-default-mar">
                                <select class="div-toggle" name="type">
                                    <option value="">Тип</option>
                                    @foreach(\App\LandType::all() as $type)
                                        <option {{ ($request->has('type') && $request->type == $type->id) ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="at-col-default-mar">
                                <select name="land_category" id="filter-land-category">
                                    <option value="" selected>Категория земли</option>
                                    @foreach(\App\LandCategory::all() as $landCategory)
                                        <option value="{{ $landCategory->id }}">{{ $landCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="at-col-default-mar">
                                <select id="filter-view-assignment" style="display: none" name="assignment">

                                </select>
                            </div>
                            <div class="at-col-default-mar">
                                <div class="at-col-default-mar">
                                    <input type="number" name="area" value="{{ $request->area }}" placeholder="Площадь">
                                </div>
                            </div>
                        </div>
                        <!-- Price Fields -->
                        <div class="main-search-field-2">
                            <div class="range-slider">
                                <input type="text" name="price" disabled class="slider_amount m-t-lg-30 m-t-xs-0 m-t-sm-10">
                                <div class="slider-range"></div>
                            </div>
                            <input type="hidden" value="{{ $priceRange->min }}" name="price_from" id="filter_price_from">
                            <input type="hidden" value="{{ $priceRange->max }}" name="price_to" id="filter_price_to">
                        </div>
                        <input type="hidden" value="{{ $catId }}" name="category">
                        <div class="col-lg-12 no-pds">
                            <div class="at-col-default-mar">
                                <button class="btn btn-default hvr-bounce-to-right" type="submit">Найти</button>
                            </div>
                        </div>
                    </form>
                    <div class="recent-post py-5">
                        <h5 class="font-weight-bold mb-4">Случайные участки</h5>
                        @foreach($similarLands as $land)
                        <div class="recent-main {{ ($loop->iteration == 2) ? 'my-4' : '' }}">
                            <div class="recent-img">
                                <a href="{{ route('single-land', $land->id) }}">
                                    <img src="{{ isset($land->images[0]) ? asset($land->images[0]->img_link) : asset('images/lands/placeholder.jpg') }}" alt="{{ $land->name }}"></a>
                            </div>
                            <div class="info-img">
                                <a href="{{ route('single-land', $land->id) }}" title="{{ $land->name }}"><h6>{{ str_limit($land->name, 13) }}</h6></a>
                                <p>{{ number_format($land->price, 0, '', ' ') }} <i class="fa fa-ruble"></i></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
        <nav>
            {{ $lands->links() }}
        </nav>
    </div>
</section>
<!-- END SECTION PROPERTIES LISTING -->
@endsection

@section('script')
    <script src="{{ asset('js/inner.js') }}"></script>
    <script src="{{ asset('js/light.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(".slider-range").slider({
            range: true,
            min: <?= $priceRange->min ?>,
            max: <?= $priceRange->max ?>,
            step: 10000,
            values: [0 , <?= $priceRange->max ?>],
            slide: function (event, ui) {
                $(".slider_amount").val("Цена: " + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " ₽ - " + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' ₽');
            }
        });
        $(".slider_amount").val("Цена: " + $(".slider-range").slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " ₽ - " + $(".slider-range").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' ₽');
    </script>
@endsection