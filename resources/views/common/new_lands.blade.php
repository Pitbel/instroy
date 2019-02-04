<!-- START SECTION FEATURED PROPERTIES -->
<section class="featured portfolio">
    <div class="container">
        <div class="row">
            <div class="section-title col-md-5">
                <h3>Новые</h3>
                <h2>Участки</h2>
            </div>
        </div>
        <div class="row portfolio-items">
            @foreach($lands as $land)
            <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                <div class="project-single">
                    <div class="project-inner project-head">
                        <div class="project-bottom">
                            <h4><a href="{{ route('single-land', $land->id) }}">Подробнее...</a><span class="category"></span></h4>
                        </div>
                        @foreach($land->images as $image)
                        <div class="button-effect">
                            <a href="{{ route('single-land', $land->id) }}" class="btn" title="Подробнее"><i class="fa fa-link"></i></a>
                            <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" title="Просмотр видео" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                            <a class="img-poppu btn" href="{{ $image->img_link }}"
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
                                <img src="{{ isset($land->images[0]) ? asset($land->images[0]->img_link) : asset('images/lands/placeholder.jpg') }}" alt="{{ $land->name }}" class="img-responsive">
                        </div>
                    </div>
                    <!-- homes content -->
                    <div class="homes-content">
                        <!-- homes address -->
                        <h3 class="title"><a href="{{ route('single-land', $land->id) }}" class="land-title">{{ $land->name }}</a></h3>
                        <p class="homes-address mb-3">
                            <i class="fa fa-map-marker"></i><span> {{ $land->address }}</span>
                        </p>
                        <p>{{ $land->short_description }}</p>
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
            @endforeach
        </div>
    </div>
    <div class="bg-all mt-5">
        <a href="{{ route('lands') }}" class="btn btn-outline-light">Посмотреть все участки</a>
    </div>
</section>
<!-- END SECTION FEATURED PROPERTIES -->