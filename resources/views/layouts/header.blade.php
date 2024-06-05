<header class="main-header" style="position:fixed;width:100%">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>B</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>RBK</b>BIOS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu" style="margin-top:10px;margin-right:10px;box-shadow:-1px 1px 5px;">
                        <!-- User image -->
                        <li class="user-header">
                            <p class="text-primary text-center">
                                <span class="material-symbols-outlined" style="font-size:120px;">
                                    account_circle
                                </span>
                                <br>
                                <span class="text-center">{{ Auth::user()->name }}</span>
                            </p>

                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="text-center">
                                <a href="/ganti-password" class="btn btn-warning" style="margin-right:2px;">Ganti
                                    Password</a>
                                <a href="/logout" class="btn btn-danger" style="margin-left:2px;">Log out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
