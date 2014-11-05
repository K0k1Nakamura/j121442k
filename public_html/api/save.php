<?php
// FIXME: 各種バリデーションとそれをユーザーに知らせることをしていないよ。＄sessionとか使うんだと思う。

session_start();

$name = $_POST['name'];
$author = $_POST['author'];
$price = $_POST['price'];
$comment = $_POST['comment'];
$name_pic =""; 
$class = $_POST['class_name'];
$university = $_POST['university'];
$faculty = $department = "";
if (isset($_POST['faculty'])) {
	$faculty = $_POST['faculty'];
}
if (isset($_POST['department'])) {
	$department = $_POST['department'];
}
$grade = $_POST['grade'];
$delivery_method = $_POST['delivery_method'];
$seller = $_SESSION['login_name'];
$stock = 1;


if ($name == "" || $price == "") {
	header("Location: ../saveForm.php");
} else {

	$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
	$query_pic = "SELECT MAX(id) FROM pic";
	$result_pic = pg_query($conn,$query_pic);
	$arr_pic = pg_fetch_array($result_pic);
	$id_pic = $arr_pic[0] + 1;

	$query_textbook = "SELECT MAX(id) FROM textbook";
	$result_textbook = pg_query($conn,$query_textbook);
	$arr_textbook = pg_fetch_array($result_textbook);
	$id_textbook = $arr_textbook[0] + 1;


	//picの有るかどうかの判定と保存
	if (isset($_FILES['pic']['error']) && is_int($_FILES['pic']['error'])) {
		try {

        // $_FILES['upfile']['error'] の値を確認
			switch ($_FILES['pic']['error']) {
            	case UPLOAD_ERR_OK: // OK
            	break;
            	case UPLOAD_ERR_NO_FILE:   // ファイル未選択
            	throw new RuntimeException('ファイルが選択されていません');
       	 	    case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
            	case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
            	throw new RuntimeException('ファイルサイズが大きすぎます');
            	default:
            	throw new RuntimeException('その他のエラーが発生しました');
            }

        // $_FILES['upfile']['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
            $type = @exif_imagetype($_FILES['pic']['tmp_name']);
            if (!in_array($type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
            	throw new RuntimeException('画像形式が未対応です');
            }

        // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
            $name_pic = $id_pic.image_type_to_extension($type);
            $path = sprintf('../pic/%s', $name_pic);
            if (!move_uploaded_file($_FILES['pic']['tmp_name'], $path)){
                //chmod 777 pic なのですっげー不安　もうちょいキツくできればしたいが755だとダメだったかも。
            	throw new RuntimeException('ファイル保存時にエラーが発生しました');
            }

            chmod($path, 0644);

            $msg = ['green', 'ファイルは正常にアップロードされました'];


            $query_insertPic = "INSERT INTO pic (id,name,textbook) VALUES ($1,$2,$3)";
            $result_insertPic = pg_prepare($conn, "", $query_insertPic);
            $result_insertPic = pg_execute($conn, "", array($id_pic, $name_pic, $id_textbook));


        } catch (RuntimeException $e) {	

        	$msg = ['red', $e->getMessage()];
        	header("Location: ../saveForm.php");

        }
    } else {
    	header("Location: mypage.php");
    }

    $query_insertText = "INSERT INTO textbook (
    	id,name,author,price,comment,pic,class,university,
    	faculty,department,grade,delivery_method,seller,stock) 
VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14)";
$result = pg_prepare($conn, "", $query_insertText);
$result = pg_execute($conn, "", array($id_textbook,$name,$author,$price,$comment,
	$name_pic,$class,$university,$faculty,$department,$grade,$delivery_method,$seller,$stock));

header("Location: ../mypage.php");


}

