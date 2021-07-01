<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">DD General Insurance</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Заказы с сайта ddgi</li>
                <li class="nav-item has-treeview">
                    <a href="{{route('site_order.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>

                        <p>Заказы</p>
                    </a>
                </li>
                <li class="nav-header">Договора</li>
                <li class="nav-item has-treeview">
                    <a href="{{--route('all_products.index')--}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>

                        <p>Продукты</p>
                    </a>
                </li>
                <li class="nav-header">Претензии</li>
                <li class="nav-item">
                    <a href="{{route('pretension.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-medkit"></i>

                        <p>Претензии</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pretensii_overview.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-medkit"></i>

                        <p>Рассмотр претензий</p>
                    </a>
                </li>
                <li class="nav-header">Полисы</li>
                <li class="nav-item">
                    <a href="{{route('policy_flows.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>

                        <p>Движение полисов</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('policies.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-archive"></i>

                        <p>Полисы</p>
                    </a>
                </li>
                <li class="nav-header">Филиалы</li>
                <li class="nav-item">
                    <a href="{{route('branches.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-buffer"></i>

                        <p>Офисы</p>
                    </a>
                </li>
                <li class="nav-header">Пользователи</li>
                <li class="nav-item">
                    <a href="{{route('directors.index')}}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>

                        <p>Директора</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('agents.index')}}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>

                        <p>Агенты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('managers.index')}}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>

                        <p>Менеджеры</p>
                    </a>
                </li>
                <li class="nav-header">Справочники</li>
                <li class="nav-item">
                    <a href="{{route('regions.index')}}" id="regions" class="nav-link">
                        <i class="nav-icon fa fa-map"></i>

                        <p>Регионы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('currencies.index')}}" id="currencies" class="nav-link">
                        <i class="nav-icon fa fa-money-bill"></i>

                        <p>Валюты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('banks.index')}}" id="banks" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>

                        <p>Банки</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('specifications.index')}}" class="nav-link">
                        <i class="nav-icon far fa-building"></i>

                        <p>Продукты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('requests.index')}}" id="banki"
                       class="nav-link {{ request()->is('spravochniki/request*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question-circle"></i>

                        <p>Запрос</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('policy_series.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>

                        <p>Серии поюсов</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("db_download") }}" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>

                        <p>export database</p>
                    </a>
                </li>

                <br />
                <br />
            </ul>
        </nav>
    </div>
</aside>
