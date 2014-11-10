$(function(){

	var text_name = class_name = university = faculty = department = "";

	function displayText(res) {
		document.getElementById("result").innerHTML="";

		if(res == null) {
			document.getElementById("result").innerHTML="There is no textbook.";
		}else{
			document.getElementById("text_list").innerHTML="";

			for (i = 0; i < res.length; i++) {
				var $div = $('<div></div>').addClass('col-sm-4 col-lg-4　col-md-4');

				// FIXME: 汚い。力技すぎる。
				$div.html('<div class="thumbnail"><div style="height:150px;width:320px;"><img src="pic/' +
					res[i].pic + '" style="max-height: 150px; width: 320px;"></div><div class="caption"><h4 class="pull-right">¥'+
					res[i].price + '</h4><h4><a href="detail.php?id=' +
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

	function resetColor(){
		$(".university_select").css("color", "#428bca");
		$(".faculty_select").css("color", "#428bca");
		$('.department_select').css("color", "#428bca");
	}


	// 教科書の名前で探す
	$('#name_search').click(function() {
		text_name = $('#textbook_name').val();
		class_name = "";

		$.get('api/searchResult.php', {
			name: text_name,
			class_name: class_name,
			university: university,
			faculty: faculty,
			department: department
		})
		.done(function(res) {
			displayText(res);
		}).fail(function(res) {
			console.log('error');
		});
	});

	// 授業の名前で探す
	$('#class_search').click(function() {
		text_name = "";
		class_name =  $('#class_name').val();

		$.get('api/searchResult.php', {
			name: text_name,
			class_name: class_name,
			university: university,
			faculty: faculty,
			department: department
		})
		.done(function(res) {
			displayText(res);
		}).fail(function(res) {
			console.log('error');
		});
	});

	// 指定なし、各カテゴリのところで呼ばれる。選択解除
	$('.no_selection').click(function() {
		resetColor();
		university = faculty = department = "";
	});

	// 大学のみ指定
	$('.university_select').click(function() {
		resetColor();
		$(this).css("color"," #f29755");

		text_name = "";
		class_name = "";
		university = $(this).parent().parent().prev().text();
		faculty = "";
		department = "";
		
		
		$.get('api/searchResult.php', {
			name: text_name,
			class_name: class_name,
			university: university,
			faculty: faculty,
			department: department
		})
		.done(function(res) {
			displayText(res);
		}).fail(function(res) {
			console.log('error');
		});
	});

	// 学部まで指定
	$('.faculty_select').click(function() {
		resetColor();
		$(this).css("color"," #f29755");

		text_name = "";
		class_name = "";
		university = $(this).parent().parent().prev().parent().parent().prev().text();
		faculty = $(this).parent().parent().prev().text();;
		department = "";

		$.get('api/searchResult.php', {
			name: text_name,
			class_name: class_name,
			university: university,
			faculty: faculty,
			department: department
		})
		.done(function(res) {
			displayText(res);
		}).fail(function(res) {
			console.log('error');
		});
	});

	//　学科まで指定 
	$('.department_select').click(function() {
		resetColor();
		$(this).css("color"," #f29755");

		text_name = "";
		class_name = "";
		university = $(this).parent().parent().prev().parent().parent().prev().text();
		faculty = $(this).parent().parent().prev().text();
		department = $(this).text();

		console.log(department);
		console.log(faculty);

		$.get('api/searchResult.php', {
			name: text_name,
			class_name: class_name,
			university: university,
			faculty: faculty,
			department: department
		})
		.done(function(res) {
			displayText(res);
		}).fail(function(res) {
			console.log('error');
		});
	});
});
