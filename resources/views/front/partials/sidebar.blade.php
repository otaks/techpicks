<!-- Sidebar  -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="/"><h3 class="text-center">{{config('app.name')}}</h3></a>
    </div>
    <ul class="list-unstyled components">
        <p>{{__('sidebar.title')}}</p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{__('sidebar.home')}}</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">{{__('sidebar.home1')}}</a>
                </li>
                <li>
                    <a href="#">{{__('sidebar.home2')}}</a>
                </li>
                <li>
                    <a href="#">{{__('sidebar.home3')}}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">{{__('sidebar.about')}}</a>
        </li>
        <li>
            <a href="/picks">{{__('sidebar.picks')}}</a>
        </li>
    </ul>
    <ul class="list-unstyled CTAs">
        <li>
            <a href="#" class="download mb-3">{{__('global.cta')}}</a>
        </li>
        <li>
            <a href="#" class="article">{{__('global.back')}}</a>
        </li>
    </ul>
</nav>