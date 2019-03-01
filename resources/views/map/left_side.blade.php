@foreach($leftSide as $news)
    <div class="media">
        <a href="/news/{{ $news->id }}/view">
            <img width="64" class="img-thumbnail align-self-start mr-3" src="{{ $news->img }}" alt="{{ $news->title }}">
        </a>
        <div class="media-body">
            <a href="/news/{{ $news->id }}/view"><h5 class="mt-0">{{ $news->title }}</h5></a>
            <span id="desc">{!! $news->short_text !!}</span>
        </div>
    </div>
@endforeach