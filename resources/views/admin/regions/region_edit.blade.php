@extends('admin.wrapper')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-10">
            <div class="card">
                <div class="header">
                    <h4 class="title">@if(isset($region)) Редактирование @else Добавление @endif района</h4>
                </div>
                <div class="content">
                    <form method="post" action="{{ (isset($region)) ? route('admin-upd-region', $region->id) : route('admin-region-create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Название района</label>
                                    <input required type="text" name="name" class="form-control border-input" placeholder="Название" value="{{ $region->name ?? old('title') }}">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">@if(isset($region)) Обновить @else Создать @endif район</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @if(Session::has('success'))
        <script>
            $.notify({
                icon: 'ti-reload',
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