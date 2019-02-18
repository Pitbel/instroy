<!-- START SECTION POPULAR PLACES -->
<section class="popular-places">
    <div class="container">
        <div class="section-title">
            <h3>Популярные</h3>
            <h2>Места</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Image Box -->
                <a href="/lands?region=1" class="img-box hover-effect">
                    <img src="{{ asset('images/popular-places/belgorod.jpg') }}" class="img-responsive" alt="">
                    <div class="img-box-content visible">
                        <h4>Белгородский район </h4>
                        <span>{{ $landCount['belgorod'] }} {{ trans_choice('front.lands_count', $landCount['belgorod']) }}</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-8 col-md-6">
                <!-- Image Box -->
                <a href="/lands?region=2" class="img-box hover-effect">
                    <img src="{{ asset('images/popular-places/shebekino.jpg') }}" class="img-responsive" alt="">
                    <div class="img-box-content visible">
                        <h4>Шебекинский район</h4>
                        <span>{{ $landCount['shbk'] }} {{ trans_choice('front.lands_count', $landCount['shbk']) }}</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-8 col-md-6">
                <!-- Image Box -->
                <a href="/lands?region=3" class="img-box hover-effect no-mb">
                    <img src="{{ asset('images/popular-places/stroitel.jpg') }}" class="img-responsive" alt="">
                    <div class="img-box-content visible">
                        <h4>Яковлевский район</h4>
                        <span>{{ $landCount['stroitel'] }} {{ trans_choice('front.lands_count', $landCount['stroitel']) }}</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Image Box -->
                <a href="/lands?region=4" class="img-box hover-effect no-mb x3">
                    <img src="{{ asset('images/popular-places/koro4a.jpg') }}" class="img-responsive" alt="">
                    <div class="img-box-content visible">
                        <h4>Корочанский район</h4>
                        <span>{{ $landCount['korocha'] }} {{ trans_choice('front.lands_count', $landCount['korocha']) }}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION POPULAR PLACES -->