<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
     id="kt_aside">
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="{{url('/')}}">
                <img alt="Logo"
                     src="{{asset('metronic/theme/default/demo1/dist/assets/media/logos/logo-light.png')}}"/>
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span><i class="flaticon-email-black-circular-button"></i></span>
                <span><i class="flaticon-email-black-circular-button"></i></span>
            </button>
        </div>
    </div>
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div
                id="kt_aside_menu"
                class="kt-aside-menu "
                data-ktmenu-vertical="1"
                data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500"
        >
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item {{request()->route()->getName() == null  ? 'kt-menu__item--active' : ''}} " aria-haspopup="true">
                    <a href="{{url('/')}}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon"><i class="flaticon-laptop"></i></span>
                        <span class="kt-menu__link-text">Dashboard</span>
                    </a>
                </li>
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Menu</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item {{request()->route()->getName() == 'suppliers.index' || request()->route()->getName() == 'suppliers.create' || request()->route()->getName() == 'suppliers.edit' ? 'kt-menu__item--active' : ''}} " aria-haspopup="true">
                    <a href="{{url('suppliers')}}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span>
                        <span class="kt-menu__link-text">Supplier</span>
                    </a>
                </li>
                <li class="kt-menu__item {{request()->route()->getName() == 'customers.index' || request()->route()->getName() == 'customers.create' || request()->route()->getName() == 'customers.edit' ? 'kt-menu__item--active' : ''}} " aria-haspopup="true">
                    <a href="{{url('customers')}}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span>
                        <span class="kt-menu__link-text">Customer</span>
                    </a>
                </li>
                <li class="kt-menu__item {{request()->route()->getName() == 'products.index' || request()->route()->getName() == 'products.create' || request()->route()->getName() == 'products.edit' ? 'kt-menu__item--active' : ''}} " aria-haspopup="true">
                    <a href="{{url('products')}}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span>
                        <span class="kt-menu__link-text">Product</span>
                    </a>
                </li>
                <li class="kt-menu__item {{request()->route()->getName() == 'supplies.index' || request()->route()->getName() == 'supplies.create' || request()->route()->getName() == 'supplies.edit' ? 'kt-menu__item--active' : ''}} " aria-haspopup="true">
                    <a href="{{url('supplies')}}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span>
                        <span class="kt-menu__link-text">Supply</span>
                    </a>
                </li>
                <li class="kt-menu__item {{request()->route()->getName() == 'orders.index' || request()->route()->getName() == 'orders.create' || request()->route()->getName() == 'orders.edit' ? 'kt-menu__item--active' : ''}} " aria-haspopup="true">
                    <a href="{{url('orders')}}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span>
                        <span class="kt-menu__link-text">Order</span>
                    </a>
                </li>
                <li class="kt-menu__item {{request()->route()->getName() == 'categories.index' || request()->route()->getName() == 'categories.create' || request()->route()->getName() == 'categories.edit' ? 'kt-menu__item--active' : ''}} " aria-haspopup="true">
                    <a href="{{url('categories')}}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span>
                        <span class="kt-menu__link-text">Category</span>
                    </a>
                </li>
{{--                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                    data-ktmenu-submenu-toggle="hover">--}}
{{--                    <a href="javascript:"--}}
{{--                       class="kt-menu__link kt-menu__toggle"><span--}}
{{--                                class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span><span--}}
{{--                                class="kt-menu__link-text">Supplier</span><i--}}
{{--                                class="kt-menu__ver-arrow la la-angle-right"></i></a>--}}
{{--                    <div class="kt-menu__submenu ">--}}
{{--                        <span class="kt-menu__arrow"></span>--}}
{{--                        <ul class="kt-menu__subnav">--}}
{{--                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span--}}
{{--                                        class="kt-menu__link"><span--}}
{{--                                            class="kt-menu__link-text"></span></span></li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('suppliers')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                            class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                            class="kt-menu__link-text">List</span></a>--}}
{{--                            </li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('suppliers/create')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                            class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                            class="kt-menu__link-text">Add</span></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                    data-ktmenu-submenu-toggle="hover">--}}
{{--                    <a href="javascript:"--}}
{{--                       class="kt-menu__link kt-menu__toggle"><span--}}
{{--                                class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span><span--}}
{{--                                class="kt-menu__link-text">Customer</span><i--}}
{{--                                class="kt-menu__ver-arrow la la-angle-right"></i></a>--}}
{{--                    <div class="kt-menu__submenu ">--}}
{{--                        <span class="kt-menu__arrow"></span>--}}
{{--                        <ul class="kt-menu__subnav">--}}
{{--                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span--}}
{{--                                        class="kt-menu__link"><span--}}
{{--                                            class="kt-menu__link-text"></span></span></li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('customers')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                            class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                            class="kt-menu__link-text">List</span></a>--}}
{{--                            </li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('customers/create')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                            class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                            class="kt-menu__link-text">Add</span></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                    data-ktmenu-submenu-toggle="hover">--}}
{{--                    <a href="javascript:"--}}
{{--                       class="kt-menu__link kt-menu__toggle"><span--}}
{{--                            class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span><span--}}
{{--                            class="kt-menu__link-text">Product</span><i--}}
{{--                            class="kt-menu__ver-arrow la la-angle-right"></i></a>--}}
{{--                    <div class="kt-menu__submenu ">--}}
{{--                        <span class="kt-menu__arrow"></span>--}}
{{--                        <ul class="kt-menu__subnav">--}}
{{--                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span--}}
{{--                                    class="kt-menu__link"><span--}}
{{--                                        class="kt-menu__link-text"></span></span></li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('products')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                        class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                        class="kt-menu__link-text">List</span></a>--}}
{{--                            </li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('products/create')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                        class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                        class="kt-menu__link-text">Add</span></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                    data-ktmenu-submenu-toggle="hover">--}}
{{--                    <a href="javascript:"--}}
{{--                       class="kt-menu__link kt-menu__toggle"><span--}}
{{--                            class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span><span--}}
{{--                            class="kt-menu__link-text">Supply</span><i--}}
{{--                            class="kt-menu__ver-arrow la la-angle-right"></i></a>--}}
{{--                    <div class="kt-menu__submenu ">--}}
{{--                        <span class="kt-menu__arrow"></span>--}}
{{--                        <ul class="kt-menu__subnav">--}}
{{--                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span--}}
{{--                                    class="kt-menu__link"><span--}}
{{--                                        class="kt-menu__link-text"></span></span></li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('supplies')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                        class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                        class="kt-menu__link-text">List</span></a>--}}
{{--                            </li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('supplies/create')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                        class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                        class="kt-menu__link-text">Add</span></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                    data-ktmenu-submenu-toggle="hover">--}}
{{--                    <a href="javascript:"--}}
{{--                       class="kt-menu__link kt-menu__toggle"><span--}}
{{--                            class="kt-menu__link-icon"><i class="flaticon2-shopping-cart"></i></span><span--}}
{{--                            class="kt-menu__link-text">Order</span><i--}}
{{--                            class="kt-menu__ver-arrow la la-angle-right"></i></a>--}}
{{--                    <div class="kt-menu__submenu ">--}}
{{--                        <span class="kt-menu__arrow"></span>--}}
{{--                        <ul class="kt-menu__subnav">--}}
{{--                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span--}}
{{--                                    class="kt-menu__link"><span--}}
{{--                                        class="kt-menu__link-text"></span></span></li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('orders')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                        class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                        class="kt-menu__link-text">List</span></a>--}}
{{--                            </li>--}}
{{--                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"--}}
{{--                                data-ktmenu-submenu-toggle="hover"><a href="{{url('orders/create')}}"--}}
{{--                                                                      class="kt-menu__link kt-menu__toggle"><i--}}
{{--                                        class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span--}}
{{--                                        class="kt-menu__link-text">Add</span></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</div>
