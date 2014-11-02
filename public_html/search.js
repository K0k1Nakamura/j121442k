$(function(){
	$('#search').click(function() {
		$.get('searchResult.php', {
			name: $('#textbook_name').val()
		})
		.done(function(res) {
			document.getElementById("result").innerHTML="";

			if(res == null) {
				document.getElementById("result").innerHTML="There is no textbook.";
			}else{
				var $div = $('<div></div>').addClass('col-sm-4 col-lg-4　col-md-4');
				
				// FIXME: 汚い。力技すぎる。
				$div.html('<div class="thumbnail"><img src="http://placehold.it/320x150" alt=""><div class="caption"><h4 class="pull-right">$24.99</h4><h4><a href="#">First Product</a></h4><p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p></div><div class="ratings"><p class="pull-right">15 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></div></div>');
				
				$('#text_list').append($div);

				// for (i = 0; i < res.length; i++) {
				// 	$('#text_table').append('<tr><td>'+res[i].id+'</td><td>'+res[i].name+'</td></tr>');	
				// }
			}
		}).fail(function(res) {
			console.log('error');
		});
	});
});
