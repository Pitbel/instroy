@extends('admin.wrapper')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-button">
                        <h4 class="title">Список населенных пунктов</h4>
                        <a href="{{ route('admin-locality-form-create') }}">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">Добавить населенный пункт</button>
                        </a>
                    </div>
                    <hr/>
                    <div class="content">
                        <ul class="list-unstyled team-members">
                            @foreach($localities as $locality)
                                <li>
                                    <div class="row block-flex-inline-center">
                                        <div class="col-md-9">
                                            <h5><a href="{{ route('admin-locality-edit', $locality->id) }}">{{ $locality->name }}</a></h5>
                                        </div>

                                        <div class="col-xs-3 text-right">
                                            <a href="{{ route('admin-locality-edit', $locality->id) }}" class="btn btn-sm btn-success btn-icon"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('admin-locality-delete', $locality->id) }}" class="btn btn-sm btn-danger btn-icon"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
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
    @if(Session::has('success-locality'))
        <script>
            $.notify({
                icon: 'ti-bell',
                message: '<?php echo Session::get('success-locality')?>',
            },{
                offset: 10,
                type: 'success',
                timer: 2000
            });
        </script>
    @endif
@endsection