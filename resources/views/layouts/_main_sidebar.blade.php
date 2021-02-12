<!-- Вертикальный меню -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <!-- <img src="../dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">-->
        <span class="brand-text font-weight-light">DD General Insurance</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional)
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{--<li class="nav-item has-treeview menu-open">--}}
                    {{--<a href="#" class="nav-link active">--}}
                        {{--<i class="nav-icon fas fa-poll"></i>--}}
                        {{--<p>--}}
                            {{--Статистика--}}

                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li class="nav-item has-treeview">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-file-contract"></i>--}}
                        {{--<p>--}}
                            {{--Отчеты--}}

                            {{--<!-- <span class="badge badge-info right">6</span>-->--}}
                        {{--</p>--}}
                    {{--</a>--}}

                {{--</li>--}}
                {{--<li class="nav-item has-treeview">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-copy"></i>--}}
                        {{--<p>--}}
                            {{--Бланки--}}

                        {{--</p>--}}
                    {{--</a>--}}

                {{--</li>--}}

                <!--Управление-->
                <li class="nav-header">Управление</li>
                <li class="nav-item has-treeview">
                    <a href="{{route('kasko.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Каско
                        </p>
                    </a>
                </li>
                {{--<li class="nav-item has-treeview">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-tasks"></i>--}}
                        {{--<p>--}}
                            {{--Фиксация договоров <!-- Здесь должно быть таблица выпики банков и фиксация договоров вместе в одном-->--}}
                        {{--</p>--}}
                    {{--</a>--}}

                {{--</li>--}}
                {{--<li class="nav-item has-treeview">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-calculator"></i>--}}
                        {{--<p>--}}
                            {{--Калкуляторы--}}
                            {{--<i class="fas fa-angle-left right"></i>--}}
                        {{--</p>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-treeview">--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>КАСКО</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>Путишествия</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>ОСГО</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}

                    {{--</ul>--}}
                {{--</li>--}}

                <!--Претензия-->

                <li class="nav-header">Претензии</li>
                <li class="nav-item">
                    <a href="{{route('pretensii.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-medkit"></i>
                        <p>
                            Претензии
                            <!--<span class="badge badge-info right">2</span>-->
                        </p>
                    </a>
                </li>
                    <li class="nav-item">
                    <a href="{{route('pretensii_overview.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-medkit"></i>
                        <p>
                            Рассмотр претензий
                            <!--<span class="badge badge-info right">2</span>-->
                        </p>
                    </a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-pen"></i>--}}
                        {{--<p>--}}
                            {{--Регистрация--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item has-treeview">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-info-circle"></i>--}}
                        {{--<p>--}}
                            {{--Статусы--}}
                            {{--<i class="fas fa-angle-left right"></i>--}}
                        {{--</p>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-treeview">--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>Выплаты</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>Отказы</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>На рассмотрении</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                <!--Финансы-->
                {{--<li class="nav-header">Финансы</li>--}}

                {{--<li class="nav-item has-treeview">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-file-alt"></i>--}}
                        {{--<p>--}}
                            {{--Отчеты--}}
                            {{--<i class="fas fa-angle-left right"></i>--}}
                        {{--</p>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-treeview">--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>По договору</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>По полису</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>По бланкам</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>По претензиям</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>По филиалам</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>Органам</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>Договоры по классам</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}

                    {{--</ul>--}}
                {{--</li>--}}


                {{--<li class="nav-item has-treeview">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-money-check"></i>--}}
                        {{--<p>--}}
                            {{--Акты на оплату--}}
                            {{--<i class="fas fa-angle-left right"></i>--}}
                        {{--</p>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-treeview">--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>По договору</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>По расторжению</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                {{--<p>По взаиморасчету</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-file-invoice-dollar"></i>--}}
                        {{--<p>--}}
                            {{--Расчет бонусов--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}



                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon far fa-times-circle"></i>--}}
                        {{--<p>--}}
                            {{--Расторжении--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-money-check-alt	"></i>--}}
                        {{--<p>--}}
                            {{--Выписки банка--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-sync-alt"></i>--}}
                        {{--<p>--}}
                            {{--Перестрахования--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <!--Продажа-->
                {{--<li class="nav-header">Продажа</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-file-signature"></i>--}}
                        {{--<p>--}}
                            {{--Создать договор--}}

                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-clipboard-list"></i>--}}
                        {{--<p>--}}
                            {{--Список договоров--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}

                <!--Полисы-->
                <li class="nav-header">Полисы</li>
                <li class="nav-item">
                    <a href="{{route('policy_registration.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Регистрация
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('policy_transfer.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-hubspot"></i>
                        <p>
                            Распределения
                        </p>
                    </a>
                </li>

                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-code-branch"></i>--}}
                        {{--<p>--}}
                            {{--Перераспределения--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}

                <li class="nav-item">
                    <a href="{{route('policy_registration.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-archive"></i>
                        <p>
                            Полисы
                        </p>
                    </a>
                </li>
                <!--Филилалы-->
                <li class="nav-header">Филиалы</li>
                <li class="nav-item">
                    <a href="{{route('branch.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-buffer"></i>
                        <p>
                            Офисы
                        </p>
                    </a>
                </li>
                <!--Клиенты-->
                {{--<li class="nav-header">Клиенты</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-portrait"></i>--}}
                        {{--<p>--}}
                            {{--Физические лица--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-building"></i>--}}
                        {{--<p>--}}
                            {{--Юридические лица--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <!--Пользователи-->
                <li class="nav-header">Пользователи</li>
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-address-card"></i>--}}
                        {{--<p>--}}
                            {{--Системные пользователи--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a href="{{route('director.index')}}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            Директора
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('agent.index')}}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            Агенты
                        </p>
                    </a>
                </li>
                <!--Справочники-->
                <li class="nav-header">Справочники</li>
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fab fa-product-hunt"></i>--}}
                        {{--<p>--}}
                            {{--Страхоовые продукты--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a href="{{route('bank.index')}}" class="nav-link">
                        <i class="nav-icon far fa-building"></i>
                        <p>
                            Банки
                        </p>
                    </a>
                </li>
                    <li class="nav-item">
                        <a href="{{route('group.index')}}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Группы
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('klass.index')}}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Классы
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Продукты
                            </p>
                        </a>
                    </li>
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-search-dollar"></i>--}}
                        {{--<p>--}}
                            {{--Тарифные ставки--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a href="{{route('policy_series.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Серии поюсов
                        </p>
                    </a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-money-bill-wave"></i>--}}
                        {{--<p>--}}
                            {{--Валюты--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <!--
                 <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                 <li class="nav-item">
                   <a href="#" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Level 1</p>
                   </a>
                 </li>
                 <li class="nav-item has-treeview">
                   <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-circle"></i>
                     <p>
                       Level 1
                       <i class="right fas fa-angle-left"></i>
                     </p>
                   </a>
                   <ul class="nav nav-treeview">
                     <li class="nav-item">
                       <a href="#" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Level 2</p>
                       </a>
                     </li>
                     <li class="nav-item has-treeview">
                       <a href="#" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>
                           Level 2
                           <i class="right fas fa-angle-left"></i>
                         </p>
                       </a>
                       <ul class="nav nav-treeview">
                         <li class="nav-item">
                           <a href="#" class="nav-link">
                             <i class="far fa-dot-circle nav-icon"></i>
                             <p>Level 3</p>
                           </a>
                         </li>
                         <li class="nav-item">
                           <a href="#" class="nav-link">
                             <i class="far fa-dot-circle nav-icon"></i>
                             <p>Level 3</p>
                           </a>
                         </li>
                         <li class="nav-item">
                           <a href="#" class="nav-link">
                             <i class="far fa-dot-circle nav-icon"></i>
                             <p>Level 3</p>
                           </a>
                         </li>
                       </ul>
                     </li>
                     <li class="nav-item">
                       <a href="#" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Level 2</p>
                       </a>
                     </li>
                   </ul>
                 </li>
                 <li class="nav-item">
                   <a href="#" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Level 1</p>
                   </a>
                 </li>
                -->
                <br>
                <br>

            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
