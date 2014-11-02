<?php
include 'ChromePhp.php';
session_start();
include("header.html");
print "<div style='height: 51px'></div>";
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-3">
            <p class="lead">Shop Name</p>
            <div class="list-group">
                <a href="#" class="list-group-item">Category 1</a>
                <a href="#" class="list-group-item">Category 2</a>
                <a href="#" class="list-group-item">Category 3</a>
            </div>
        </div>

        <div class="col-md-9">
            <div>
            教科書名<input type="text" name="textbook_name" id="textbook_name">
                <input type="submit" id="search" value="Search"><br>
            </div>
            <div id="result">sdfghjk</div>
            <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
            <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script src="search.js"></script>

            <div class="row" id="text_list">

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$24.99</h4>
                            <h4><a href="#">Firnnnnnstm uuu u u uhhhhhhh hhhh hhhhhhhhh hhhhh Product</a>
                            </h4>
                            <h6>hjjjj<br>dfghjklkjhgf</h6>   
                        </div>
                       
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4>$64.99</h4>
                            <h4><a href="#">Second Product</a>
                            </h4>
                            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">12 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </p>
                        </div>
                    </div>
                </div>

               
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <h4><a href="#">Like this template?</a>
                    </h4>
                    <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                    <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                </div>

            </div>

        </div>

    </div>

</div>
<!-- /.container -->
<?php
include("footer.html");
