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
				for (i = 0; i < res.length; i++) {
				var $div = $('<div></div>').addClass('col-sm-4 col-lg-4　col-md-4');
				
				// FIXME: 汚い。力技すぎる。
				$div.html('<div class="thumbnail"><img src="http://placehold.it/320x150" alt=""><div class="caption"><h4 class="pull-right">¥'+
					res[i].price + '</h4><h4><a href="' +
					'#' + '">' +
					res[i].name + '</a></h4><p>' +
					res[i].comment + '</p></div><div class="ratings"><p class="pull-right">15 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></div></div>');
				
				$('#text_list').append($div);

				
					// $('#text_table').append('<tr><td>'+res[i].id+'</td><td>'+res[i].name+'</td></tr>');	
				}
			}
		}).fail(function(res) {
			console.log('error');
		});
	});
});
