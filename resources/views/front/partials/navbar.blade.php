<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fa fa-align-left"></i>
            <span>{{__('navbar.title')}}</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">{{__('navbar.page1')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('navbar.page2')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('navbar.page3')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('navbar.page4')}}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>