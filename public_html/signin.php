<?php
include 'ChromePhp.php';
session_start();
include("header.html");
?>



<?php
if(!isset($_SESSION["login_name"])){
    ?>

    <h2>登録</h2>
    <form method="POST" action="regist.php">
        ログイン名<input type="text" name="login_name"><br>
        password<input type="text" name="pwd"><br>
        <input type="submit" value="登録">
    </form>
    <h2>ログイン</h2>
    <form method="POST" action="login.php">
        ログイン名<input type="text" name="login_name"><br>
        password<input type="text" name="pwd"><br>
        <input type="submit" value="ログイン">
    </form>

    <?php
}else{
    ?>
    <h2>ようこそ！</h2>
    <a href="logout.php">ログアウト</a>
    <h2>出品</h2>
    <form method="POST" action="display.php">
        教科書名<input type="text" name="name"><br>
        価格<input type="text" name="price"><br>
        <input type="submit" value="出品">    
    </form>
    <?php
}
ChromePhp::log('セッション');
ChromePhp::log($_SESSION);
?>      
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>
<h2>こんにちは</h2>

<!-- ============================================================================================================ -->

<?php
include("footer.html");
ChromePhp::log($_SESSION);
?>