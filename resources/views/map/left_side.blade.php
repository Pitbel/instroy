@foreach($leftSide as $news)
    <div class="media align-items-center mb-2">
        <a href="/news/{{ $news->id }}/view">
            <img width="64" class="img-thumbnail mr-3" src="{{ $news->img }}" alt="{{ $news->title }}">
        </a>
        <div class="media-body">
            <a href="/news/{{ $news->id }}/view"><h5 class="mt-0" style="font-size: 1em;">{{ $news->title }}</h5></a>
        </div>
    </div>
@endforeach