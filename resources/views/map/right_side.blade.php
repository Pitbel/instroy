@foreach($rightSide as $land)
    <div class="media">
        <a href="/catalog/item/{{ $land->id }}/view">
            <img width="64" class="img-thumbnail align-self-start mr-3" src="{{ (isset($land->images[0])) ? $land->images[0]->img_link : '' }}" alt="{{ $land->name }}">
        </a>
        <div class="media-body">
            <a href="/catalog/item/{{ $land->id }}/view"><h5 class="mt-0">{{ $land->name }}</h5></a>
            <span id="desc">{!! $land->short_description !!}</span>
        </div>
    </div>
@endforeach