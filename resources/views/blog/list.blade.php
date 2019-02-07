@extends('wrapper')
@section('content')
    <!-- START HEADING BLOG -->
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Новости</h1>
                <h2><a href="index.html">Главная </a> &nbsp;/&nbsp; Новости</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION BLOG -->
    <section class="blog">
        <div class="container">
            @php $num = 1; @endphp
            @if($num % 3)
            <div class="row">
                @foreach($news as $new)
                <div class="col-lg-4 col-md-6 blog-pots hover-effect">
                    <div class="single-blog-post">
                        <div class="blog-list img-box">
                            <img src="{{ $new->img }}" alt="">
                            <div class="social">
                                <span class="date">{{ $new->created_at->format('d') }}<span>{{ shortMonthsToRus($new->created_at->format('n')) }}</span></span>
                                <a href="#"><i class="fa fa-clock"></i><span>{{ $new->created_at->format('H:i') }}</span></a>
                                <a href="#"><i class="fa fa-user-o"></i><span>{{ env('APP_NAME') }}</span></a>
                            </div>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="{{ route('news-single', $new->id) }}"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-info">
                            <a href="blog-details.html"><h3 class="mb-2">{{ $new->title }}</h3></a>
                            <p>{{ $new->short_text }}</p>
                            <a href="{{ route('news-single', $new->id) }}" class="btn btn-secondary">Подробнее...</a>
                        </div>
                    </div>
                </div>
                @php $num++; @endphp
                @if($num % 3 == 1) </div><div class="row {{ $num % 2 == 0 ? 'space' : '' }}"> @endif
                @endforeach
            </div>
            @endif
            <nav aria-label="..." class="pt-5">
                <ul class="pagination">
                    {{ $news->render() }}
                </ul>
            </nav>
        </div>
    </section>
    <!-- END SECTION BLOG -->
@endsection