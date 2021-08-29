<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Super Admin</p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ Route::Is('dashboard.welcome') ? 'active' : '' }}">
                <a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i><span>@lang('dashboard.dashboard')</span></a>
            </li>

            <li class="{{ Route::Is(['dashboard.categoreys.index','dashboard.categoreys.create','dashboard.categoreys.edit']) ? 'active' : '' }}">
                <a href="{{ route('dashboard.categorys.index') }}"><i class="fa fa-list-alt"></i><span>@lang('dashboard.categorey')</span></a>
            </li>

            <li class="{{ Route::Is(['dashboard.products.index','dashboard.products.create','dashboard.products.edit']) ? 'active' : '' }}">
                <a href="{{ route('dashboard.products.index') }}"><i class="fa fa-list-alt"></i><span>@lang('dashboard.products')</span></a>
            </li>

        </ul>

    </section>

</aside>

