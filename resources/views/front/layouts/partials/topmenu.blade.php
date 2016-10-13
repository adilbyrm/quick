<!--Mobile Menu Toggle-->
<div class="menu-toggle"><i class="fa fa-list"></i></div>
<div class="mobile-border"><span></span></div>

<!--Main Menu-->
<nav class="menu">
    <ul class="main">
        <li class="hide-sm"><a href="{{url('/')}}">Anasayfa</a></li>
        <li class="has-submenu"><a href="#">Kurumsal<i class="fa fa-chevron-down"></i></a>
            <ul class="submenu">
                <li><a href="#">Kurumsal 1</a></li>
                <li><a href="#">Kurumsal 2</a></li>
                <li><a href="#">Kurumsal 3</a></li>
            </ul>
        </li>
        <li class="hide-sm"><a href="#">Hakkımızda</a></li>
        <li class="hide-sm"><a href="#">İletişim</a></li>
    </ul>
    <ul class="catalog" style="text-align:left">
        <li class="has-submenu" style="background-color:#2ba8db"><a href="shop-filters-left-3cols.html">Markalar<i class="fa fa-chevron-down"></i></a>
            <ul class="submenu" style="width:auto">
            @foreach($trademarks as $tm)
                <li><a href="#{{$tm->RowID}}">{{$tm->Name}}</a></li>
            @endforeach
            </ul>
        </li>
        <li class="has-submenu"><a href="shop-filters-left-3cols.html">Grup 1<i class="fa fa-chevron-down"></i></a>
            <ul class="submenu" style="width:auto">
                <li><a href="#">Grup 1</a></li>
                <li><a href="#">Grup 1</a></li>
                <li><a href="#">Grup 1</a></li>
                <li><a href="#">Grup 1</a></li>

            </ul>
        </li>
        <li><a href="shop-filters-left-3cols.html">Grup 2</a></li>
        <li><a href="shop-filters-left-3cols.html">Grup 3</a></li>
        <li class="has-submenu"><a href="shop-filters-left-3cols.html">Grup 4<i class="fa fa-chevron-down"></i></a>
            <ul class="submenu" style="width:auto">
                <li><a href="#">Nokia 4</a></li>
                <li><a href="#">Nokia 4</a></li>
                <li><a href="#">Nokia 4</a></li>
                <li><a href="#">Nokia 4</a></li>

            </ul>
        </li>
        <li class="has-submenu"><a href="shop-filters-left-3cols.html">Grup 5<i class="fa fa-chevron-down"></i></a>
            <ul class="submenu" style="width:auto">
                <li><a href="#">Nokia 5</a></li>
                <li><a href="#">Nokia 5</a></li>
                <li><a href="#">Nokia 5</a></li>
                <li><a href="#">Nokia 5</a></li>

            </ul>
        </li>
    </ul>
</nav>