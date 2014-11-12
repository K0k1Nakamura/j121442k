$(function(){

	function displayText(res) {
		document.getElementById("result").innerHTML="";

		if(res == null ) {
			document.getElementById("result").innerHTML="There is no textbook.";
		}else{
			document.getElementById("text_list").innerHTML="";

			for (i = 0; i < res.length; i++) {
				var $div = $('<div></div>').addClass('col-sm-4 col-lg-4　col-md-4');

				// FIXME: 汚い。力技すぎる。
				$div.html('<div class="thumbnail"><div style="height:150px;width:320px;"><img src="pic/' +
					res[i].pic + '" style="max-height: 150px; width: 320px;"></div><div class="caption"><h4 class="pull-right">¥'+
					res[i].price + '</h4><h4><a href="detailMyText.php?id=' +
					res[i].id + '">' +
					res[i].name + '</a></h4><h6>' +
					res[i].author + '</h6><h6>'　+
					res[i].class + '</h6><h6>' + 
					res[i].university + ' ' + 
					res[i].faculty + ' ' + 
					res[i].department + '</h6>');
					 // +res[i].comment + '</p>');
				// </div><div class="ratings"><p class="pull-right">15 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></div></div>
				
				$('#text_list').append($div);

				
			}
		}
	}

	$(function() {
		$.get('api/displayedTextRes.php')
		.done(function(res) {
			displayText(res);
		}).fail(function(res) {
			console.log('error');
		});
	});

	
});
