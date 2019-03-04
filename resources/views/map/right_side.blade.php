<h4 class="text-center">Участки</h4>
<hr/>
@foreach($rightSide as $land)
    <div class="media mt-2 align-items-center">
        <a href="/catalog/item/{{ $land->id }}/view">
            <img width="64" class="rounded mr-3" src="{{ (isset($land->images[0])) ? $land->images[0]->img_link : '' }}" alt="{{ $land->name }}">
        </a>
        <div class="media-body">
            <a href="/catalog/item/{{ $land->id }}/view"><h5 style="font-size: 1em;" class="mt-0">{{ $land->name }}</h5></a>
        </div>
    </div>
@endforeach