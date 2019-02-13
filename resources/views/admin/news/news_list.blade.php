@extends('admin.wrapper')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-button">
                        <h4 class="title">Список Новостей</h4>
                        <a href="{{ route('admin-news-form-create') }}">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">Добавить новость</button>
                        </a>
                    </div>
                    <hr/>
                    <div class="content">
                        <ul class="list-unstyled team-members">
                            @foreach($news as $item)
                                <li>
                                    <div class="row block-flex-inline-center">
                                        <div class="col-md-1">
                                            <a href="{{ route('admin-news-edit', $item->id) }}"><img src="{{ isset($item->img) ? asset($item->img) : asset('images/lands/placeholder.jpg') }}" alt="{{ $item->title }}" class="img-no-padding img-responsive"></a>
                                        </div>
                                        <div class="col-md-8">
                                            <h5><a href="{{ route('admin-news-edit', $item->id) }}">{{ $item->title }}</a></h5>
                                            <p>{!! $item->short_text !!}</p>
                                        </div>

                                        <div class="col-xs-3 text-right">
                                            <a href="{{ route('admin-news-edit', $item->id) }}" class="btn btn-sm btn-success btn-icon"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('admin-news-delete', $item->id) }}" class="btn btn-sm btn-danger btn-icon"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <small>Дата создания: {{ ($item->created_at->diff(now())->days < 1) ? $item->created_at->diffForHumans() : $item->created_at->format('d.m.Y') }}</small>
                                    <br/>
                                    <small>Категория: {{ $item->category->name }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if(Session::has('success-news'))
        <script>
            $.notify({
                icon: 'ti-bell',
                message: '<?php echo Session::get('success-news')?>',
            },{
                offset: 10,
                type: 'success',
                timer: 2000
            });
        </script>
    @endif
@endsection