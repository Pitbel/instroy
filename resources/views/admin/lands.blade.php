@extends('admin.wrapper')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-button">
                        <h4 class="title">Список участков</h4>
                        <a href="{{ route('admin-land-form-create') }}">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">Добавить новый участок</button>
                        </a>
                    </div>
                    <hr/>
                    <div class="content">
                        <ul class="list-unstyled team-members">
                            @foreach($lands as $land)
                            <li>
                                <div class="row block-flex-inline-center">
                                    <div class="col-md-1">
                                        <a href="{{ route('admin-land-edit', $land->id) }}"><img src="{{ isset($land->images[0]) ? asset($land->images[0]->img_link) : asset('images/lands/placeholder.jpg') }}" alt="{{ $land->name }}" class="img-no-padding img-responsive"></a>
                                    </div>
                                    <div class="col-md-8">
                                        <h5><a href="{{ route('admin-land-edit', $land->id) }}">{{ $land->name }} <span class="text-warning">({{ $land->type->name }})</span></a></h5>
                                        <ul class="lands-list-ul">
                                            <li data-placement="left" data-toggle="tooltip" title="Назначение земли">
                                                <img class="img-properties mr-2" src="{{ asset('svg/building.svg') }}">
                                                <span>{{ $land->locality->name }}</span>
                                            </li>
                                            <li data-placement="left" data-toggle="tooltip" title="Площадь">
                                                <img class="img-properties mr-2" src="{{ asset('svg/land.svg') }}">
                                                <span>{{ $land->area }}</span>
                                            </li>
                                            <li data-placement="left" data-toggle="tooltip" title="Категория земли">
                                                <img class="img-properties mr-2" src="{{ asset('svg/land-category.svg') }}">
                                                <span>{{ $land->category->name }} - {{ $land->land_category->name }}</span>
                                            </li>
                                            <li data-placement="left" data-toggle="tooltip" title="Назначение земли">
                                                <img class="img-properties mr-2" src="{{ asset('svg/assignment.svg') }}">
                                                <span>{{ $land->assignment->name }}</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <a href="{{ route('admin-land-edit', $land->id) }}" class="btn btn-sm btn-success btn-icon"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                                <small>Дата создания: {{ ($land->created_at->diff(now())->days < 1) ? $land->created_at->diffForHumans() : $land->created_at->format('d.m.Y') }}</small>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
        <script>
            $.notify({
                icon: 'ti-bell',
                message: '<?php echo Session::get('success')?>',
            },{
                offset: 10,
                type: 'success',
                timer: 2000
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $.notify({
                icon: 'ti-alert',
                message: '<?php echo Session::get('error')?>',
            },{
                offset: 10,
                type: 'danger',
                timer: 2000
            });
        </script>
    @endif
@endsection