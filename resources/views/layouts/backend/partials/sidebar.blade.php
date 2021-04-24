@php
    $usr = Auth::guard('admin')->user()
@endphp
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{ asset('backend/assets/images/users/1.jpg') }}" alt="user-img" class="img-circle"><span class="hide-menu">Admin </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout.submit') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Logout</a></li>
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                    </ul>
                </li>
                <li> <a class=" waves-effect waves-dark" href="{{ url('/admin') }}" ><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </a></span>
                </li>
                
                    <li> 
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Admins</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                               
                                <a href="{{ route('admin.admins.create') }}">Create Admins</a>
                                
                            </li>
                            <li>
                               
                                <a href="{{ route('admin.admins.index') }}">Admins List</a>
                                
                            </li>              
                        </ul>
                    </li>
                
                    {{--<li> 
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Users</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                
                                <a href="{{ route('admin.user.create') }}">Create Users</a>
                                
                            </li>
                            <li>
                               
                                <a href="{{ route('admin.user.index') }}">Users List</a>
                                
                            </li>
                        </ul>
                    </li>--}}
                
                    <li> 
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Roles</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                
                                <a href="{{ route('admin.roles.index') }}">Roles Table</a>
                                
                            </li>
                            <li>
                                
                                <a href="{{ route('admin.roles.create') }}">Create Roles Table</a>
                               
                            </li> 
                        </ul>
                    </li>
               
                <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-menu"></i><span class="hide-menu">Category</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            
                            <a href="{{ route('admin.category.index') }}">Category</a>
                            
                        </li>
                        <li>
                            <a href="{{ route('admin.category.create') }}">Create Category</a>
                            
                        </li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-light" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Warehouses</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.warehouse.create') }}">Create New Warehouse</a></li>
                        <li><a href="{{ route('admin.warehouse.index') }}">Warehouse List</a></li>                   
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-light" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Brand</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.brand.create') }}">Create New Brand</a></li>
                        <li><a href="{{ route('admin.brand.index') }}">Brand List</a></li>                   
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Product</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.product.create') }}">Create New Product</a></li>
                        <li><a href="{{ route('admin.product.index') }}">Product List</a></li>   
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Purchase</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.purchase.create') }}">Create New Purchase</a></li>
                        <li><a href="{{ route('admin.purchase.index') }}">Purchase List</a></li>   
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Invoice</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.invoice.index') }}">View Invoice</a></li>
                        <li><a href="{{ route('admin.invoice.pending') }}">Approval Invoice</a></li>   
                    </ul>
                </li>
                {{--<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Admins</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.admins.create') }}">Create Admins</a></li>
                        <li><a href="{{ route('admin.admins.index') }}">Admins List</a>
                        </li>              
                    </ul>
                </li> 
                @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Product</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">Create New Product</a></li>
                        <li><a href="javascript:void(0)">Product List</a></li>   
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">People </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">Customer</a></li>
                        <li><a href="javascript:void(0)">Suplier</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-light" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Warehouses</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">Create New Warehouse</a></li>
                        <li><a href="javascript:void(0)">Warehouse List</a></li>                   
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Purchase</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">Puschase List</a></li>
                        <li><a href="javascript:void(0)">Create New Purchase</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-accordion-merged"></i><span class="hide-menu">Sales</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">Sales List</a></li>
                        <li><a href="javascript:void(0)">Create New Sale</a></li>
                        <li><a href="javascript:void(0)">Return Sale</a></li>
                    </ul>
                </li>

                <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-gallery"></i><span class="hide-menu">Transaction</span></a>
                </li>
                
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
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-pie-chart"></i><span class="hide-menu">Charts</span></a>
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