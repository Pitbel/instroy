@extends('admin.wrapper')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-10">
            <div class="card">
                <div class="header">
                    <h4 class="title">@if(isset($land)) Редактирование @else Добавление @endif участка</h4>
                </div>
                <div class="content">
                    <form method="post" action="{{ (isset($land)) ? route('admin-upd-land', $land->id) : route('admin-land-create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Название</label>
                                    <input required type="text" name="name" class="form-control border-input" placeholder="Название" value="{{ $land->name ?? old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Категория</label>
                                    <select required name="category_id" class="form-control border-input">
                                        <option value="">Выберите категорию</option>
                                        @foreach(\App\Category::orderBy('name', 'asc')->get() as $category)
                                            <option value="{{ $category->id }}" @if(isset($land) && $category->id == $land->category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Категория земли</label>
                                    <select required name="land_category_id" class="form-control border-input">
                                        <option value="">Выберите тип земли</option>
                                        @foreach(\App\LandCategory::orderBy('name', 'asc')->get() as $landCategory)
                                            <option value="{{ $landCategory->id }}" @if(isset($land) && $landCategory->id == $land->land_category->id) selected @endif>{{ $landCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Тип</label>
                                    <select required name="type_id" class="form-control border-input">
                                        <option value="">Выберите тип</option>
                                        @foreach(\App\LandType::orderBy('name', 'asc')->get() as $type)
                                            <option value="{{ $type->id }}" @if(isset($land) && $type->id == $land->type->id) selected @endif>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Цена</label>
                                    <input required name="price" type="number" class="form-control border-input" placeholder="Цена" value="{{ $land->price ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Площадь</label>
                                    <input required name="area" type="text" class="form-control border-input" placeholder="Площадь" value="{{ $land->area ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Назначение</label>
                                    <select required name="assignment_id" class="form-control border-input">
                                        <option value="">Выберите назначение</option>
                                        @foreach(\App\Assignment::orderBy('name', 'asc')->get() as $assignment)
                                            <option value="{{ $assignment->id }}" @if(isset($land) && $assignment->id == $land->assignment->id) selected @endif>{{ $assignment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Местоположение</label>
                                    <select required name="locality_id" class="form-control border-input">
                                        <option value="">Выберите местоположение</option>
                                        @foreach(\App\LandRegion::orderBy('name', 'asc')->get() as $region)
                                            <optgroup label="{{ $region->name }}" data-i="{{ $loop->iteration }}">
                                                @foreach($region->localities as $locality)
                                                    <option value="{{ $locality->id }}" @if(isset($land) && $locality->id == $land->locality->id) selected @endif>{{ $locality->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Адрес</label>
                                    <input required name="address" type="text" class="form-control border-input" placeholder="Адрес" value="{{ $land->address ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Геоданные (Кликните на место которое хотите указать для отображения на карте)</label>
                                    <div id="map-contact" class="contact-map"></div><br/>
                                    <input required name="geo_location" type="hidden" id="geolocation-single" class="form-control border-input" placeholder="Пример: 50.597814,36.590330" value="{{ $land->geo_location ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ isset($land) ? 'Обновить' : 'Добавить' }} изображения</label>
                                    <div class='file-input'>
                                        <input @if(!isset($land)) required  @endif type='file' id="filesToUpload" name="images[]" multiple>
                                        <span class='button'>Выбрать файлы</span>
                                        <label class='data-js-label-label'>Файл не выбран</label>
                                    </div>
                                </div>
                                @if (isset($land))
                                @foreach($land->images as $image)
                                    <img src="{{ asset($image->img_link) }}" alt="{{ $land->name }}" class="img-no-padding img-responsive land-edit-images">
                                @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Краткое описание</label>
                                    <textarea required name="short_description" rows="5" class="form-control border-input" placeholder="Описание">{{ $land->short_description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Полное описание</label>
                                    <textarea required name="description" rows="15" class="form-control border-input" placeholder="Описание">{{ $land->description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">@if(isset($land)) Обновить участок @else Создать участок @endif</button>
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
<script src="{{ asset('admin/assets/js/leaflet.js') }}"></script>
<script src="{{ asset('admin/assets/js/leaflet-gesture-handling.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/leaflet-providers.js') }}"></script>
<script src="{{ asset('admin/assets/js/leaflet.markercluster.js') }}"></script>
<script>
    if ($('#map-contact').length) {
        var geo = '<?php echo (isset($land)) ? $land->geo_location : false ?>';
        var zoomSize = 11;

        if (geo === undefined || geo.length == 0) {
            geo = [50.59500687557325,36.586189270019524]; //Belgorod
        } else {
            geo = geo.split(',');
            zoomSize = 16;
        }

        var map = L.map('map-contact', {
            zoom: zoomSize,
            maxZoom: 18,
            tap: false,
            gestureHandling: true,
            center: [geo[0], geo[1]]
        });

        var Hydda_Full = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            scrollWheelZoom: false,
            subdomains:['mt0','mt1','mt2','mt3'],
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var icon = L.divIcon({
            html: '<i class="fa fa-building"></i>',
            iconSize: [50, 50],
            iconAnchor: [50, 50],
            popupAnchor: [-20, -42]
        });

        var marker = L.marker([geo[0], geo[1]], {
            icon: icon
        }).addTo(map);

        map.on('click', function(ev) {
            $('#geolocation-single').val(ev.latlng.lat + ',' + ev.latlng.lng);
            map.panTo([ev.latlng.lat, ev.latlng.lng]);
            map.removeLayer(marker);
            marker = L.marker([ev.latlng.lat, ev.latlng.lng], {
                icon: icon
            }).addTo(map);

            $.notify({
                icon: 'ti-location-pin',
                message: 'Новое значение геоданных установлено',
            },{
                offset: 10,
                type: 'success',
                timer: 2000
            });
        });
    }
</script>
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