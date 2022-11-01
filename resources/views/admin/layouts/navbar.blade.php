 <body data-sidebar="dark" data-layout-mode="light">

     <!-- <body data-layout="horizontal" data-topbar="dark"> -->
     <!-- Begin page -->
     <div id="layout-wrapper">
         <header id="page-topbar">
             <div class="navbar-header">
                 <div class="d-flex">
                     <!-- LOGO -->
                     <div class="navbar-brand-box">

                         <a href="index.html" class="logo logo-light">
                             <span class="logo-lg">
                                 <img src="{{ env('APP_ASSET_URL') }}assets/logo/LOGO-KGS-01-initial-white.svg" alt="">
                             </span>
                         </a>
                     </div>

                     <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                         <i class="fa fa-fw fa-bars"></i>
                     </button>

                     <!-- App Search-->
                     <form class="app-search d-none d-lg-block">
                         <div class="position-relative">
                             <input type="text" class="form-control" placeholder="Search...">
                             <span class="bx bx-search-alt"></span>
                         </div>
                     </form>

                 </div>

                 <div class="d-flex">

                     <div class="dropdown d-inline-block d-lg-none ms-2">
                         <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="mdi mdi-magnify"></i>
                         </button>
                         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                             <form class="p-3">
                                 <div class="form-group m-0">
                                     <div class="input-group">
                                         <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                         <div class="input-group-append">
                                             <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>

                     <div class="dropdown d-none d-lg-inline-block ms-1">
                         <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                             <i class="bx bx-fullscreen"></i>
                         </button>
                     </div>

                     @include('admin.layouts.notifications')

                     @include('admin.layouts.profile')

                     <div class="dropdown d-inline-block">
                         <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                             <i class="bx bx-cog bx-spin"></i>
                         </button>
                     </div>

                 </div>
             </div>
         </header>

         <!-- ========== Left Sidebar Start ========== -->
         <div class="vertical-menu">

             <div data-simplebar class="h-100">

                 <!--- Sidemenu -->
                 <div id="sidebar-menu">
                     <!-- Left Menu Start -->
                     <ul class="metismenu list-unstyled" id="side-menu">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-dashboards">Dashboards</span>
                            </a>
                        </li>
                        <li class="menu-title" key="t-apps">Apps</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-proposal">Proposals</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ env('APP_URL') }}{{ env('APP_ADMIN_SECTION') }}/proposals" key="t-proposal-list">List</a></li>
                                <li><a href="{{ env('APP_URL') }}{{ env('APP_ADMIN_SECTION') }}/proposals/create" key="t-proposal-detail">Create New</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-briefcase-alt-2"></i>
                                <span key="t-projects">Projects</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ env('APP_URL') }}projects" key="t-p-grid">List</a></li>
                                <li><a href="{{ env('APP_URL') }}projects/create" key="t-create-new">Create New</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-tasks">Tasks</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="tasks-list.html" key="t-task-list">List</a></li>
                                <li><a href="tasks-kanban.html" key="t-kanban-board">Kanban Board</a></li>
                                <li><a href="tasks-create.html" key="t-create-task">Create Task</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-invoices">Invoices</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="invoices-list.html" key="t-invoice-list">List</a></li>
                                <li><a href="invoices-detail.html" key="t-invoice-detail">Invoice Detail</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bxs-user-detail"></i>
                                <span key="t-contacts">Clients</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="contacts-grid.html" key="t-user-grid">Users Grid</a></li>
                                <li><a href="contacts-list.html" key="t-user-list">Users List</a></li>
                                <li><a href="contacts-profile.html" key="t-profile">Profile</a></li>
                            </ul>
                        </li>
                     </ul>
                 </div>
                 <!-- Sidebar -->
             </div>
         </div>
         <!-- Left Sidebar End -->