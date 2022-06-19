<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  }else{

    $admindets = $_SESSION['admindets'];

      $result=mysqli_query($con,"SELECT COUNT('id') AS ttl FROM socials");
      $counter=mysqli_fetch_assoc($result);
      $nsocials = $counter['ttl'];

      $rs=mysqli_query($con,"SELECT COUNT('id') AS total FROM socialaccounts WHERE is_buy = 1");
      $ctr=mysqli_fetch_assoc($rs);
      $nbsaccts = $ctr['total'];


      $ts=mysqli_query($con,"SELECT COUNT('id') AS total FROM socialaccounts");
      $cts=mysqli_fetch_assoc($ts);
      $nsaccts = $cts['total'];


  }
   ?>

<html lang="en" class="" style="height: auto;"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>TOPSOCIAL||ADMIN Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./vendor/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./vendor/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="./vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm" style="height:auto;background:#121212;color:white">

<div class="wrapper" style='background:#121212;color:white'>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  navbar-light text-sm" style='background:#121212;color:white'>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style='color:white'><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../adminend/dashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../adminend/logout.php" class="nav-link">Log Out</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?= $_SESSION['userdets']['email'] ?></span>
          <div class="dropdown-divider"></div>
          <a href="../adminend/profile.php" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>Profie
          </a>
          <div class="dropdown-divider"></div>
          <a href="../adminend/logout.php"  class="dropdown-item">
            <i class="fa fa-power-off mr-2"></i> Sign Out
          </a>
        </div>
      </li>

    </ul>
  </nav>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  elevation-4" style='background:#121212;'>
    <a href="../adminend/dashboard.php" class="brand-link text-sm">
        <center><b><tt style='color:white;'>TOPSOCIAL</tt></b></center>
      <span class="brand-text font-weight-light"><b></b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 287px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./vendor/dist/img/avatar.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style='color:white;'>
          <a href="profile.php" class="d-block" style='color:white;'><?= $admindets['name']  ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="../adminend/dashboard.php" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dasboard
            </p>
          </a>
        </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="../adminend/profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../adminend/logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Out</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-header">ACTIONS</li>

          <li class="nav-item">
            <a href="../adminend/createagedaccounts.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Aged Accounts
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../adminend/boughtagedacc.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Bought Aged Accounts
              </p>
            </a>
          </li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 26.1107%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 287.031px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ADMIN DASHBOARD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
