<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?> | Bathijs Admin</title>
    <meta name="description" content="<?= $title ?> | Bathijs Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-dashboard/vendors/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-dashboard/vendors/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-dashboard/vendors/themify-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-dashboard/vendors/flag-icon-css/css/flag-icon.min.cs') ?>s">
    <link rel="stylesheet" href="<?= base_url('admin-dashboard/vendors/selectFX/css/cs-skin-elastic.css') ?>">
    
    <link rel="stylesheet" href="<?= base_url('admin-dashboard/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-dashboard/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>">
    
    <link rel="stylesheet" href="<?= base_url('admin-dashboard/assets/css/style.css') ?>">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?= base_url('admin') ?>">
                    Bathijs Admin
                </a>
                <a class="navbar-brand hidden" href="<?= base_url('admin') ?>">
                    A
                </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <li <?= $navActive=="admin"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin') ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="<?= base_url('livezilla') ?>"> <i class="menu-icon fa fa-comments"></i>LiveZilla</a>
                    </li>
                    <li>
                        <a href="<?= base_url('') ?>"> <i class="menu-icon ti ti-layout"></i>Front-office</a>
                    </li>
                    
                    <h3 class="menu-title">Website</h3><!-- /.menu-title -->
                    <li <?= $navActive=="projects"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/projects') ?>"><i class="menu-icon fa fa-files-o"></i>Projects</a>
                    </li>
                    <li <?= $navActive=="categories"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/categories') ?>"><i class="menu-icon fa fa-list-alt"></i>Categories</a>
                    </li>
                    <li <?= $navActive=="testimonials"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/testimonials') ?>"><i class="menu-icon fa fa-check-square"></i>Testimonials</a>
                    </li>
                    <li <?= $navActive=="team"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/team') ?>"><i class="menu-icon fa fa-users"></i>Team</a>
                    </li>
                    <li <?= $navActive=="faq"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/faq') ?>"><i class="menu-icon fa fa-question-circle"></i>FAQ</a>
                    </li>

                    <h3 class="menu-title">Marketing</h3><!-- /.menu-title -->
                    <li <?= $navActive=="social"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/social') ?>"><i class="menu-icon fa fa-facebook"></i>Social media</a>
                    </li>

                    <h3 class="menu-title">Settings</h3><!-- /.menu-title -->
                    <li <?= $navActive=="seo"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/seo') ?>"><i class="menu-icon fa fa-font"></i>SEO</a>
                    </li>
                    <li <?= $navActive=="translations"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/translations') ?>"><i class="menu-icon fa fa-globe"></i>Translations</a>
                    </li>
                    <?php if(isset(session()->superAdmin)){if (session()->superAdmin){ ?>
                    <h3 class="menu-title">Advanced settings</h3><!-- /.menu-title -->
                    <li <?= $navActive=="admins"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/admins') ?>"><i class="menu-icon fa fa-user"></i>Admin users</a>
                    </li>
                    <li <?= $navActive=="activity"? 'class="active"':'' ?>>
                        <a href="<?= base_url('admin/activity') ?>"><i class="menu-icon fa fa-history"></i>Activity history</a>
                    </li>
                    <li <?= $navActive=="settings"? 'class="active"':'' ?>><a href="<?= base_url('admin/settings') ?>"><i class="menu-icon fa fa-cog"></i>Settings</a></li>
                    <?php }} ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?= base_url($avatar) ?>" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?= base_url('admin/profile') ?>"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" href="<?= base_url('admin/settings') ?>"><i class="fa fa-cog"></i> Settings</a>
                            <a class="nav-link" href="<?= base_url('admin/authentication/logout') ?>"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?= $title ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <?php foreach ($breadcrumb as $page){?>
                            <li><a href="<?= $page['url'] ?>"><?= $page['title'] ?></a></li>
                            <?php } ?>
                            <li class="active"><?= $title ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">