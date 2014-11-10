<?php
session_start();
if(isset($_SESSION["login_name"])){
    header("Location: index.php");
}else{
    $message ="";
    if (isset($_POST["message"])) {
        $message = $_POST["message"];
    }
    include 'ChromePhp.php';
    include("header.html");
    print "<div style='height: 51px'></div>";
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">Sign in</h1>
            <h5 align="center" style="color:red;"><?php print $message?></h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Please input.   
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" method="post" action="api/signinCheck.php">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>ユーザー名</label>
                                    <input name="login_name" class="form-control" required>
                                    <p class="help-block">※半角英数字で入力してください。</p>
                                </div>

                                <div class="form-group">
                                    <label>パスワード</label>
                                    <input name="pwd" class="form-control" type="password" required>
                                    <p class="help-block">※半角英数字で6文字以上で入力してください。</p>
                                </div>

                            </div>

                            <!-- /.col-lg-6 (nested) -->
                            <div align="center">
                                <button type="submit" class="btn btn-default">Sign in</button>
                                <button type="reset" class="btn btn-default">リセット</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php
    include("footer.html");
    ChromePhp::log($_SESSION);
}
