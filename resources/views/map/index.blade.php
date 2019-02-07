<!-- STAR HEADER GOOGLE MAP -->
<div id="map-container" class="fullwidth-home-map header-map google-maps pull-top map-leaflet-wrapper">
    <div class="map-filter">
        <select name="region">
            <option value="">Все районы</option>
            @foreach($regions as $region)
                <option value="{{ $region->id }}">{{ $region->name }}</option>
            @endforeach
        </select>
    </div>
    <div id="map-leaflet"></div>
    <div id="hero-area" class="main-search-inner search-2">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Search Form -->
                    <div class="trip-search">
                        <form class="form" method="get" action="{{ route('lands') }}">
                            <!-- Form Lookin for -->
                            <div class="form-group looking">
                                <div class="first-select wide">
                                    <div class="main-search-input-item">
                                        <input type="text" name="q" placeholder="Что вы ищите?" value="" />
                                    </div>
                                </div>
                            </div>
                            <!--/ End Form Lookin for -->
                            <!-- Form Location -->
                            <div class="form-group location height-set">
                                <select class="wide" name="region">
                                    <option value="">Все районы</option>
                                    @foreach($regions as $region)
                                    <optgroup label="{{ $region->name }}" data-i="{{ $loop->iteration }}">
                                        @foreach($region->localities as $locality)
                                        <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <!--/ End Form Location -->
                            <!-- Form Categories -->
                            <div class="form-group categories">
                                <select class="wide" name="type">
                                    <option value="">Тип</option>
                                    @foreach(\App\LandType::all() as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--/ End Form Categories -->
                            <!-- Form Button -->
                            <div class="form-group button">
                                <button type="submit" class="btn">Поиск</button>
                            </div>
                            <!--/ End Form Button -->
                        </form>
                    </div>
                    <!--/ End Search Form -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER GOOGLE MAP -->