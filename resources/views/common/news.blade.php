<!-- START SECTION BLOG -->
<section class="blog-section">
    <div class="container">
        <div class="section-title">
            <h3>Последнии</h3>
            <h2>Новости</h2>
        </div>
        <div class="news-wrap">
            <div class="row">
                @foreach($news as $item)
                <div class="col-xl-4 col-md-6 col-xs-12">
                    <div class="news-item">
                        <a href="{{ route('news-single', $item->id) }}" class="news-img-link">
                            <div class="news-item-img">
                                <img class="img-responsive" src="{{ $item->img }}" alt="blog image">
                            </div>
                        </a>
                        <div class="news-item-text">
                            <a href="{{ route('news-single', $item->id) }}"><h3>{{ $item->title }}</h3></a>
                            <div class="dates">
                                <span class="date">{{ ($item->created_at->diff(now())->days < 1) ? $item->created_at->diffForHumans() : $item->created_at->format('d.m.Y') }}</span>
                            </div>
                            <div class="news-item-descr big-news">
                                <p>{{ $item->short_text }}</p>
                            </div>
                            <div class="news-item-bottom">
                                <a href="{{ route('news-single', $item->id) }}" class="news-link">Подробнее...</a>
                                <div class="admin">
                                    <p>ООО «Инстрой»</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BLOG -->