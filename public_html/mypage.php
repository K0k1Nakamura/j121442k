<?php
include 'ChromePhp.php';
session_start();
if(!isset($_SESSION["login_name"])){
    print "fuck you";
}else{
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
                                    <a href="signout.php">Sign out</a>
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
            <div class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

                <div class="navbar-default sidebar col-md-3" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">



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
                                <a href="#" class="no_selection">慶應義塾大学</a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </div>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">出品フォーム</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Please input infomation    
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form">
                                            <div class="form-group">
                                                <label>教科書名</label>
                                                <input class="form-control">
                                                <p class="help-block">※必須項目です。</p>
                                            </div>

                                            <div class="form-group">
                                                <label>著者名</label>
                                                <input class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>価格</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">¥</span>
                                                    <input class="form-control">
                                                </div>
                                                <p class="help-block">※必須項目です。</p>
                                            </div>

                                            <div class="form-group">
                                                <label>出品者</label>
                                                <p class="form-control-static"><?php print "$_SESSION[login_name]"?>さん</p>
                                            </div>

                                            <div class="form-group">
                                                <label>写真</label>
                                                <input type="file">
                                                <p class="help-block">※おっきすぎるのははいらないよお。</p>
                                            </div>

                                            <div class="form-group">
                                                <label>商品詳細、説明文</label>
                                                <textarea class="form-control" rows="8"></textarea>
                                                <p class="help-block">
                                                    ※商品の状態や説明を入力してください。<br>
                                                    <br>
                                                    例)<br>
                                                    多少書き込みありますが、状態は綺麗です。<br>
                                                    中村晃貴先生の書かれた名著中の名著です！    
                                                </p>
                                            </div>
                                        </div>

                                        <!-- /.col-lg-6 (nested) -->

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>授業名</label>
                                                <input class="form-control" placeholder="任意">
                                                <p class="help-block">※その教科書が使用される授業名を入力してください。</p>
                                            </div>

                                            <div class="form-group">
                                                <label>学年</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>その他</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>大学</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>学部等</label>
                                                <select class="form-control" disabled="disable">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>学科等</label>
                                                <select class="form-control" disabled="disable">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>受け渡し方法</label>
                                                <select class="form-control">
                                                    <option>手渡しのみ</option>
                                                    <option>郵送のみ</option>
                                                    <option>手渡し、郵送可</option>
                                                    <option>要相談</option>
                                                </select>
                                            </div>




                                        </form>


                                        
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                                <button type="submit" class="btn btn-default">出品</button>
                                <button type="reset" class="btn btn-default">リセット</button>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>

            <!-- Navigation -->

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
    <?php
}
