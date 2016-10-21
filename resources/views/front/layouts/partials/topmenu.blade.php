<!--Mobile Menu Toggle-->
<div class="menu-toggle"><i class="fa fa-list"></i></div>
<div class="mobile-border"><span></span></div>

<!--Main Menu-->
<nav class="menu">
    <ul class="main">
        <li class="hide-sm"><a href="{{ route('homepage') }}">Anasayfa</a></li>
        <li class="has-submenu"><a href="#">Kurumsal<i class="fa fa-chevron-down"></i></a>
            <ul class="submenu">
                <li><a href="#">Kurumsal 1</a></li>
                <li><a href="#">Kurumsal 2</a></li>
                <li><a href="#">Kurumsal 3</a></li>
            </ul>
        </li>
        <li class="hide-sm"><a href="{{ route('about') }}">Hakkımızda</a></li>
        <li class="hide-sm"><a href="{{ route('contact') }}">İletişim</a></li>
    </ul>
    <ul class="catalog" style="text-align:left">
        <li class="has-submenu" style="background-color:#2ba8db"><a href="shop-filters-left-3cols.html">Markalar<i class="fa fa-chevron-down"></i></a>
            <ul class="submenu" style="width:auto">
            @foreach($trademarks as $trademark)
                <li><a href="#{{ $trademark->ID }}">{{ $trademark->Name }}</a></li>
            @endforeach
            </ul>
        </li>

        @foreach($productGroups as $key => $productGroup)
            @if($key < 4)
                <li><a href="#{{ $productGroup->ID }}">{{ $productGroup->Name }}</a></li>
            @else
                @break {{-- butun dizinin donguye girmemesi icin else --}} 
            @endif
        @endforeach

        <li class="has-submenu"><a href="shop-filters-left-3cols.html">Diğer<i class="fa fa-chevron-down"></i></a>
            <ul class="submenu" style="width:auto">
            @foreach($productGroups as $key => $productGroup)
                @if($key > 3)
                    <li><a href="#{{ $productGroup->ID }}">{{ $productGroup->Name }}</a></li>
                @endif
            @endforeach
            </ul>
        </li>
    </ul>
</nav>