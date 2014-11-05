<?php
include 'ChromePhp.php';
session_start();
if(!isset($_SESSION["login_name"])):
	print "fuck you";
else:
	include("header2.html"); 
?>
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
					<form role="form" enctype="multipart/form-data" method="post" action="api/save.php">
						<div class="col-lg-6">
							<div class="form-group">
								<label>教科書名</label>
								<input name="name" class="form-control">
								<p class="help-block">※必須項目です。</p>
							</div>

							<div class="form-group">
								<label>著者名</label>
								<input name="author" class="form-control">
							</div>

							<div class="form-group">
								<label>価格</label>
								<div class="input-group">
									<span class="input-group-addon">¥</span>
									<input name="price" class="form-control">
								</div>
								<p class="help-block">※必須項目です。</p>
							</div>

							<div class="form-group">
								<label>出品者</label>
								<p class="form-control-static"><?php print "$_SESSION[login_name]"?>さん</p>
							</div>

							<div class="form-group">
								<label>写真</label>
								<input name="pic" type="file">
								<p class="help-block">※おっきすぎるのははいらないよお。</p>
							</div>

							<div class="form-group">
								<label>商品詳細、説明文</label>
								<textarea name="comment" class="form-control" rows="8"></textarea>
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
								<input name="class_name" class="form-control" placeholder="任意">
								<p class="help-block">※その教科書が使用される授業名を入力してください。</p>
							</div>

							<div class="form-group">
								<label>学年</label>
								<select name="grade" class="form-control">
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
								<select name="university" class="form-control">
									<option value="" label="111"></option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<div class="form-group">
								<label>学部等</label>
								<select name="faculty" class="form-control" disabled="disable">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>

							<div class="form-group">
								<label>学科等</label>
								<select name="department" class="form-control" disabled="disable">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<div class="form-group">
								<label>受け渡し方法</label>
								<select name="delivery_method" class="form-control">
									<option>手渡しのみ</option>
									<option>郵送のみ</option>
									<option>手渡し、郵送可</option>
									<option>要相談</option>
								</select>
							</div>


						</div>

						<!-- /.col-lg-6 (nested) -->
						<button type="submit" class="btn btn-default">出品</button>
						<button type="reset" class="btn btn-default">リセット</button>

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
<?
include("footer2.html");
endif;