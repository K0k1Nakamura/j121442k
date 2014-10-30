<?php
include 'ChromePhp.php';
session_start();
include("header.html");
print "<div style='height: 50px'></div>";
?>



<?php
if(!isset($_SESSION["login_name"])){
    ?>
    <h2>Sign in</h2>
    <form method="POST" action="signinCheck.php">
        name<input type="text" name="login_name"><br>
        password<input type="text" name="pwd"><br>
        <input type="submit" value="ログイン">
    </form>

    <?php
}else{
    ?>
    
    <h1>もうさいんいんしてる！！！！！！！！！！！</h1>

    <?php
}
ChromePhp::log('セッション');
ChromePhp::log($_SESSION);
?>      


<?php
include("footer.html");
ChromePhp::log($_SESSION);
