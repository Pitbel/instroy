<!-- START FOOTER -->
<footer class="first-footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="netabout">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('css/colors/icons/pink/logo-footer.svg') }}" alt="Logo">
                        </a>
                        <p>ООО «Инстрой» — компания работающая в сфере загородного коттеджного строительства. Мы готовы предложить нашим клиентам земельные участки в живописных районах Белгородской области как с подрядом, так и без подряда.</p>
                        <a href="about.html" class="btn btn-secondary">Подробнее...</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Навигация</h3>
                        <div class="nav-footer">
                            <ul>
                                <li><a href="index.html">О нас</a></li>
                            </ul>
                            <ul class="nav-right">
                                <li><a href="properties-right-sidebar.html">Новости</a></li>
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
                                    <p class="in-p">95 South Park Ave, USA</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p">+456 875 369 208</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">support@findhouses.com</p>
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