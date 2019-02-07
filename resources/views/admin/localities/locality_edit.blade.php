@extends('admin.wrapper')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-10">
            <div class="card">
                <div class="header">
                    <h4 class="title">@if(isset($locality)) Редактирование @else Добавление @endif населенного пункта</h4>
                </div>
                <div class="content">
                    <form method="post" action="{{ (isset($locality)) ? route('admin-upd-locality', $locality->id) : route('admin-locality-create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Район</label>
                                    <select name="region_id" class="form-control border-input" required>
                                        <option value="">Выберите район</option>
                                        @foreach($regions as $region)
                                        <option @if(isset($locality) && $region->id == $locality->region_id) selected @endif value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Название населенного пункта</label>
                                    <input required type="text" name="name" class="form-control border-input" placeholder="Название" value="{{ $locality->name ?? old('title') }}">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">@if(isset($locality)) Обновить @else Создать @endif населенный пункт</button>
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