@extends('admin.wrapper')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-10">
            <div class="card">
                <div class="header">
                    <h4 class="title">@if(isset($news)) Редактирование" @else Добавление @endif новости</h4>
                </div>
                <div class="content">
                    <form method="post" action="{{ (isset($news)) ? route('admin-upd-news', $news->id) : route('admin-news-create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Название новости</label>
                                    <input required type="text" name="title" class="form-control border-input" placeholder="Название" value="{{ $news->title ?? old('title') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Категория</label>
                                    <select name="category" class="form-control border-input">
                                        @foreach(\App\NewsCategory::orderBy('name', 'asc')->get() as $category)
                                        <option value="{{ $category->id }}" @if(isset($news) && $category->id == $news->category_id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Отображать только для населенного пункта</label>
                                    <select name="locality_id" class="form-control border-input">
                                        <option value="">Нет</option>
                                        @foreach(\App\LandRegion::orderBy('name', 'ASC')->get() as $region)
                                            <optgroup label="{{ $region->name }}" data-i="{{ $loop->iteration }}">
                                                @foreach($region->localities as $locality)
                                                    <option {{ (isset($news) && $news->locality_id == $locality->id) ? 'selected' : '' }} value="{{ $locality->id }}">{{ $locality->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ isset($news) ? 'Обновить' : 'Добавить' }} изображение</label>
                                    <div class='file-input'>
                                        <input type='file' id="filesToUpload" name="img">
                                        <span class='button'>Выбрать файл</span>
                                        <label class='data-js-label-label'>Файл не выбран</label>
                                    </div>
                                </div>
                                @if (isset($news))
                                    <img src="{{ asset($news->img) }}" alt="{{ $news->title }}" class="img-no-padding img-responsive land-edit-images">
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Краткое описание</label>
                                    <textarea required name="short_text" rows="5" class="form-control border-input" placeholder="Описание">{{ $news->short_text ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Полное описание</label>
                                    <textarea required name="full_text" rows="15" class="form-control border-input" placeholder="Описание">{{ $news->full_text ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">@if(isset($news)) Обновить новость @else Создать новость @endif</button>
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