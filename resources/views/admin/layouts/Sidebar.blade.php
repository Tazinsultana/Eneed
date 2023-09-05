<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dist/img/logo4.png')}}" alt="E-Need" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">E-Need</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/logo5.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admindashboard') }}" class="d-block">DashBoard</a>
                       
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('addcategory') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Categoies</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('allcategory') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Sub Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('addsubcategory') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Sub Categoies</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('allsubcategory') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Sub Categories</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('addproduct') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('allproduct') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Product</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pendingorder') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('confirmedorder') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Confirmed Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cancelledorder') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cancelled orders</p>
                            </a>
                        </li>
                    </ul>
                </li>



            </ul>








        </nav>

        <!-- /.sidebar -->
    </div>
</aside>
