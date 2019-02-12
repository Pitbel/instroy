@extends('wrapper')
@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>{{ $news->title }}</h1>
                <h2><a href="index.html">Главная </a> &nbsp;/&nbsp; {{ $news->title }}</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION BLOG -->
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="single-blog-post">
                                <div class="blog-list img-box">
                                    <img src="{{ asset($news->img) }}" alt="{{ $news->title }}">
                                    <div class="social">
                                        <span class="date">{{ $news->created_at->format('d') }}<span>{{ shortMonthsToRus($news->created_at->format('n')) }}</span></span>
                                        <a href="#"><i class="fa fa-clock"></i><span>{{ $news->created_at->format('H:i') }}</span></a>
                                        <a href="#"><i class="fa fa-user-o"></i><span>ООО «Инстрой»</span></a>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <h3 class="mb-2 title">{{ $news->title }}</h3>
                                    <p>{!! $news->full_text !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-3 col-md-12">
                    <div class="widget">
                        @if(count($recentNews) > 0)
                        <div class="recent-post">
                            <h5 class="font-weight-bold mb-4">Недавние новости</h5>
                            @foreach($recentNews as $news)
                            <div class="recent-main mb-4">
                                <div class="recent-img">
                                    <a href="{{ route('news-single', $news->id) }}"><img src="{{ $news->img  }}" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="{{ route('news-single', $news->id) }}"><h6>{{ $news->title }}</h6></a>
                                    <p style="color: #aaa">{{ $news->created_at->format('d.m.Y') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- END SECTION BLOG -->
@endsection