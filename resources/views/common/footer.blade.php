<!-- START FOOTER -->
<footer class="first-footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="netabout">
                        <a href="/" class="logo">
                            <img style="width: 100px; border-radius: 8px;" src="{{ asset('images/logo.jpg') }}" alt="Logo">
                        </a>
                        <p>ООО «Инстрой» — компания работающая в сфере загородного коттеджного строительства. Мы готовы предложить нашим клиентам земельные участки в живописных районах Белгородской области как с подрядом, так и без подряда.</p>
                        <a href="/company" class="btn btn-secondary">Подробнее...</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Навигация</h3>
                        <div class="nav-footer">
                            <ul>
                                <li><a href="/company">О нас</a></li>
                            </ul>
                            <ul class="nav-right">
                                <li><a href="/news">Новости</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget">
                        <h3>Последние новости</h3>
                        <div class="twitter-widget contuct">
                            <div class="twitter-area">
                                @foreach(\App\News::orderBy('created_at', 'desc')->limit(3)->get() as $news)
                                <div class="single-item">
                                    <div class="icon-holder">
                                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="text">
                                        <h5><a href="#">{{ $news->title }}</a></h5>
                                        <h4>{{ ($news->created_at->diff(now())->days < 1) ? $news->created_at->diffForHumans() : $news->created_at->format('d.m.Y') }}</h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contactus">
                        <h3>Связаться с нами</h3>
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p">г. Белгород, пр. Славы, 39</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p">
                                        +7 (4722) 32-73-13
                                        <br/>
                                        +7 (4722) 32-76-57
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">instroybel@mail.ru</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer">
        <div class="container">
            <p>ООО «Инстрой» © 2019 - Все права защищены.</p>
        </div>
    </div>
</footer>

<a data-scroll href="#heading" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!-- END FOOTER -->