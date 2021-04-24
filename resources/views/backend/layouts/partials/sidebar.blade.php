<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="user-img" class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Logout</a></li>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                    </ul>
                </li>
                @if(Request::is('admin*'))
                <li> <a class=" waves-effect waves-dark" href="{{ url('/admin/home') }}" ><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </a></span>
                    
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Category</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.category.index') }}">Category</a></li>
                        <li><a href="{{ route('admin.sub_category.index') }}">Sub Category</a></li>
                        <li><a href="{{ route('admin.brand.index') }}">Brand</a></li>

                        
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Product</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.product.create') }}">Create New Product</a></li>
                        <li><a href="{{ route('admin.product.index') }} ">Product List</a></li>   
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">People </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.customer.index') }}">Customer</a></li>
                        <li><a href="{{ route('admin.supplier.index') }}">Suplier</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-light" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Warehouses</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.warehouse.create') }}">Create New Warehouse</a></li>
                        <li><a href="{{ route('admin.warehouse.index') }}">Warehouse List</a></li>                   
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Purchase</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.purchase.index') }}">Puschase List</a></li>
                        <li><a href="{{ route('admin.purchase.create') }}">Create New Purchase</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-accordion-merged"></i><span class="hide-menu">Sales</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.sales.index') }}">Sales List</a></li>
                        <li><a href="{{ route('admin.sales.create') }}">Create New Sale</a></li>
                        <li><a href="javascript:void(0)">Return Sale</a></li>
                    </ul>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{ route('admin.transaction.index') }}" aria-expanded="false"><i class="ti-gallery"></i><span class="hide-menu">Transaction</span></a>
                </li>
                @endif
                @if(Request::is('manager*'))
                    <li> <a class=" waves-effect waves-dark" href="{{ url('/manager/home') }}" ><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </a></span>
                </li>
                @endif
                @if(Request::is('accountent*'))
                    <li> <a class=" waves-effect waves-dark" href="{{ url('/accountent/home') }}" ><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </a></span>
                </li>
                @endif
                @if(Request::is('salesman*'))
                    <li> <a class=" waves-effect waves-dark" href="{{ url('/salesman/home') }}" ><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </a></span>
                </li>
                @endif
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-files"></i><span class="hide-menu">Staffs</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="starter-kit.html">Admin</a></li>
                        <li><a href="starter-kit.html">Manager</a></li>
                        <li><a href="starter-kit.html">Accountant</a></li>
                        <li><a href="starter-kit.html">Sales Man</a></li>
                    </ul>
                </li>
                {{-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-pie-chart"></i><span class="hide-menu">Charts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="chart-morris.html">Morris Chart</a></li>
                        <li><a href="chart-chartist.html">Chartis Chart</a></li>
                        <li><a href="chart-echart.html">Echarts</a></li>
                        <li><a href="chart-flot.html">Flot Chart</a></li>
                        <li><a href="chart-knob.html">Knob Chart</a></li>
                        <li><a href="chart-chart-js.html">Chartjs</a></li>
                        <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                        <li><a href="chart-extra-chart.html">Extra chart</a></li>
                        <li><a href="chart-peity.html">Peity Charts</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-light-bulb"></i><span class="hide-menu">Icons</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-simple-lineicon.html">Simple Line icons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                        <li><a href="icon-iconmind.html">Mind Icons</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-location-pin"></i><span class="hide-menu">Maps</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="map-google.html">Google Maps</a></li>
                        <li><a href="map-vector.html">Vector Maps</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">item 1.1</a></li>
                        <li><a href="javascript:void(0)">item 1.2</a></li>
                        <li> <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                <li><a href="javascript:void(0)">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">item 1.4</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- SUPPORT</li>
                <li> <a class="waves-effect waves-dark" href="../documentation/documentation.html" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Documentation</span></a></li>
                <li> <a class="waves-effect waves-dark" href="pages-login.html" aria-expanded="false"><i class="far fa-circle text-success"></i><span class="hide-menu">Log Out</span></a></li>
                <li> <a class="waves-effect waves-dark" href="pages-faq.html" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">FAQs</span></a></li>
            </ul>
        </nav> --}}
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>