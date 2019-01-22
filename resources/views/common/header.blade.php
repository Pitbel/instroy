<!-- START SECTION HEADINGS -->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-info hidden-sm-down">
                <div class="call-header">
                    <p><i class="fa fa-phone" aria-hidden="true"></i> +7 (4722) 32-73-13, +7 (4722) 32-76-57</p>
                </div>
                <div class="address-header">
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> г. Белгород, пр. Славы, 39</p>
                </div>
                <div class="mail-header">
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> instroybel@mail.ru</p>
                </div>
            </div>
            <div class="top-social hidden-sm-down">
                <p>Недвижимость Белгорода — земельные участки для жилья и бизнеса</p>
            </div>
        </div>
    </div>
    <div class="header-bottom heading sticky-header" id="heading">
        <div class="container">
            <a href="/" class="logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="realhome">
            </a>
            <button type="button" class="button-menu hidden-lg-up" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <form action="#" id="bloq-search" class="collapse">
                <div class="bloq-search">
                    <input type="text" placeholder="search...">
                    <input type="submit" value="Search">
                </div>
            </form>

            <nav id="main-menu" class="collapse">
                <ul>
                    <!-- STAR COLLAPSE MOBILE MENU -->
                    <li class="hidden-lg-up">
                        <div class="po">
                            <a href="/" aria-expanded="false">Главная</a>
                        </div>
                    </li>
                    <!-- END COLLAPSE MOBILE MENU -->
                    <li class="hidden-md-down">
                        <a @if(request()->route()->getName() == 'home') class="active" @endif aria-haspopup="true" aria-expanded="false" href="/">Главная</a>
                    </li>
                    @foreach(\App\Category::all() as $category)
                    <!-- STAR COLLAPSE MOBILE MENU -->
                    @if($category->subcat_id == 0)
                    <li class="hidden-lg-up">
                        <a @if($category->is_dropdown) data-toggle="collapse" @endif href="{{ route('lands-list', $category->slug) }}" aria-expanded="false">{{ $category->name }}</a>
                        @if($category->is_dropdown)
                            <div class="collapse" id="about">
                                <div class="card card-block">
                                    @foreach(\App\Category::where('subcat_id', $category->id)->get() as $submenu)
                                    <a class="dropdown-item" href="{{ route('lands-list', $submenu->slug) }}">{{ $submenu->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </li>
                    <!-- END COLLAPSE MOBILE MENU -->
                    <li class="@if($category->is_dropdown) dropdown @endif hidden-md-down">
                        <a @if($category->slug == request()->route()->parameter('slug') and $category->is_dropdown == 0) class="active" @endif @if($category->is_dropdown) class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" @endif aria-expanded="false" href="{{ route('lands-list', $category->slug) }}">{{ $category->name }}</a>
                        @if($category->is_dropdown)
                            <div class="dropdown-menu">
                                @foreach(\App\Category::where('subcat_id', $category->id)->get() as $submenu)
                                <a class="dropdown-item" href="{{ route('lands-list', $submenu->slug) }}">{{ $submenu->name }}</a>
                                @endforeach
                            </div>
                        @endif
                    </li>
                    @endif
                    @endforeach
                    <!-- STAR COLLAPSE MOBILE MENU -->
                    <li class="hidden-lg-up">
                        <a href="#blog" aria-expanded="false">Новости</a>
                    </li>
                    <!-- END COLLAPSE MOBILE MENU -->
                    <li class="hidden-md-down">
                        <a aria-haspopup="true" aria-expanded="false" href="#">Новости</a>
                    </li>
                    <li><a href="contact-us.html">Компания</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>