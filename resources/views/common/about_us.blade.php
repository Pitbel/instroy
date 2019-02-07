@extends('wrapper')
@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Компания</h1>
                <h2><a href="index.html">Главная </a> &nbsp;/&nbsp; О компании</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION ABOUT -->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 who-1">
                    <div>
                        <h2 class="text-left mb-4">О компании <span>{{ env('APP_NAME') }}</span></h2>
                    </div>
                    <div class="pftext">
                        <p>
                            ООО «Инстрой» — компания работающая в сфере загородного коттеджного строительства. Мы готовы предложить нашим клиентам земельные участки в живописных районах Белгородской области как с подрядом, так и без подряда.



                            Мы предполагаем более многовариантное развитие делового партнерства: сотрудничество с агентствами недвижимости, долевое строительство, сдача земельных наделов в аренду на выгодных для арендатора условиях, рассрочка платежа по продаже и аренде, прочие взаимовыгодные решения.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 who">
                    <div class="wprt-image-video w50">
                        <img alt="image" src="images/blog/b-1.jpg">
                        <a class="icon-wrap popup-video popup-youtube" href="https://www.youtube.com/watch?v=2xHQqYRcrx4"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION ABOUT -->

    <!-- START SECTION SERVICES -->
    <main class="services-2">
        <div class="container">
            <div class="section-title">
                <h3>Ключевые </h3>
                <h2>плюсы</h2>
            </div>
            <div class="row service-1">
                <article class="col-md-4 serv">
                    <div class="art-1 img-1">
                        <img src="images/1.png" width="52" alt="">
                        <h3>С нами можно торговаться!</h3>
                    </div>
                </article>
                <article class="col-md-4 serv">
                    <div class="art-1 img-2">
                        <img src="images/2.png" width="52" alt="">
                        <h3>Полная информация о своих объектах</h3>
                    </div>
                </article>
                <article class="col-md-4 serv">
                    <div class="art-1 img-3">
                        <img src="images/3.png" width="52" alt="">
                        <h3>Самая обширная база по участкам</h3>
                    </div>
                </article>
            </div>
        </div>
    </main>
    <!-- END SECTION SERVICES -->
@endsection