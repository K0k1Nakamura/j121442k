<?php
include 'ChromePhp.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="wrapper">

            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">さんぷる</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->


                    <!-- 非ログイン時のナビゲーションバー -->
                    <?php
                    if(!isset($_SESSION["login_name"])){
                        ?>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="index.php">About</a>
                                </li>
                                <li>
                                    <a href="search.php">Search</a>
                                </li>
                                <li>
                                    <a href="signin.php">Sign in</a>
                                </li>
                                <li>
                                    <a href="register.php">Register</a>
                                </li>
                            </ul>
                        </div>

                        <!--　ログイン時のナビゲーションバー -->

                        <?php
                    }else{
                        ?>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <?php print "<a href=\"mypage.php\">".htmlspecialchars($_SESSION["login_name"])."さん、ようこそ。</a>"?>
                                </li>
                                <li>
                                    <a href="index.php">About</a>
                                </li>
                                <li>
                                    <a href="search.php">Search</a>
                                </li>
                                <li>
                                    <a href="api/signout.php">Sign out</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                        <?php
                    }
                    ?>

                </div>
                <!-- /.container -->
            </nav>


            <!-- Navigation -->
            <div class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

                <div class="navbar-default sidebar col-md-3" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">


                            <!-- 教科書名で探す -->
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" id="textbook_name" placeholder="教科書名から探す">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" id="name_search" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </li>
                            
                            <!-- 授業名で探す -->
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" id="class_name" placeholder="授業名から探す">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" id="class_search" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </li>

                            <h5>大学、学部から探す<br></h5>

                            <!--  大学名一覧！！　-->
                            <li>
                                <a href="#" class="no_selection">指定なし</a>
                            </li>
                            <li>
                                <a href="#" class="no_selection">慶應義塾大学<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#" class="university_select">全て</a>
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">文学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">人文社会学科</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">経済学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">経済学科</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">理工学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">情報工学科</a>
                                            </li>
                                            <li>
                                                <a href="#"　class="department_select">システムデザイン工学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">機械工学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">電子工学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">応用化学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">物理情報工学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">管理工学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">数理科学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">物理学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">化学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">生命情報学科</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">法学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">法律学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">政治学科</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">商学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">商学科</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">医学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">医学科</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">総合政策学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">総合政策学科</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">環境情報学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">環境情報学科</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">看護医療学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">看護学科</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="no_selection">薬学部<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" class="faculty_select">全て</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">薬学科</a>
                                            </li>
                                            <li>
                                                <a href="#" class="department_select">薬科学科</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#" class="no_selection">早稲田大学<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#" class="university_select">全て</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </div>

            <div id="page-wrapper">

                <!-- あまりにヒューリスティックだけど、ここにdivとらないと背景の表示が若干ずれる。  -->
                <div style="height: 30px"></div>
               <!--  <div>
                    教科書名<input type="text" name="textbook_name" id="textbook_name">
                    <input type="submit" id="search" value="Search"><br>
                </div> -->
                <div id="result"></div>
                

                <div class="row" id="text_list"></div>

            </div>
        </div>
        <!-- /#wrapper -->

        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="search.js"></script>

        <!-- jQuery Version 1.11.0 -->
        <script src="js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/sb-admin-2.js"></script>

    </body>

    </html>
