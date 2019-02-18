@extends('admin.wrapper')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-10">
                <div class="card">
                    <div class="header">
                        <h4 class="title">@if(isset($category)) Редактирование @else Добавление @endif категории</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="{{ (isset($category)) ? route('admin-news-category-upd', $category->id) : route('admin-news-category-store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Название категории</label>
                                        <input autofocus required type="text" name="name" class="form-control border-input" placeholder="Название" value="{{ $category->name ?? old('name') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">@if(isset($category)) Обновить @else Создать @endif категорию</button>
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