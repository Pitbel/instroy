@extends('wrapper')
@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Blog Details</h1>
                <h2><a href="index.html">Home </a> &nbsp;/&nbsp; Blog Details</h2>
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
                                    <img src="{{ $news->img }}" alt="">
                                    <div class="social">
                                        <span class="date">{{ $news->created_at->format('d') }}<span>{{ $news->created_at->formatLocalized('%b') }}</span></span>
                                        <a href="#"><i class="fa fa-clock"></i><span>{{ $news->created_at->format('H:i') }}</span></a>
                                        <a href="#"><i class="fa fa-user-o"></i><span>ООО «Инстрой»</span></a>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <h3 class="mb-2 title">{{ $news->title }}</h3>
                                    <p>{{ $news->full_text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-3 col-md-12">
                    <div class="widget">
                        <h5 class="font-weight-bold mb-4">Поиск</h5>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                            <button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </span>
                        </div>
                        <div class="recent-post py-5">
                            <h5 class="font-weight-bold">Категории</h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Категория 1</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Категория 2</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Категория 3</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Категория 4</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Категория 5</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Категория 6</a></li>
                            </ul>
                        </div>
                        @if(count($recentNews) > 0)
                        <div class="recent-post pt-5">
                            <h5 class="font-weight-bold mb-4">Недавние новости</h5>
                            @foreach($recentNews as $news)
                            <div class="recent-main">
                                <div class="recent-img">
                                    <a href="{{ route('blog-single', $news->id) }}"><img src="{{ $news->img  }}" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="{{ route('blog-single', $news->id) }}"><h6>{{ $news->title }}</h6></a>
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