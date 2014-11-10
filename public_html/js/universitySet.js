$(function(){
	$('.university_list > option').remove();
	$('.faculty_list > option').remove();
	$('.department_list > option').remove();

	$.get('api/university.php')
	.done(function(res) {
		$('.university_list').append('<option value="">指定なし</option>');
		for (i = 0; i < res.length; i++) {
			var $div = $('<option></option>');
			$div.html(res[i].name);
			$('.university_list').append($div);
		}
	}).fail(function(res) {
		console.log('error');
	});

	$('.university_list').change(function() {
		$('.faculty_list > option').remove();
		$('.department_list > option').remove();

		if($(this).val() == ""){
			$('.faculty_list').attr("disabled", "disabled");
			$('.department_list').attr("disabled", "disabled");
		} else {
			$('.faculty_list').removeAttr("disabled");
			$('.department_list').attr("disabled", "disabled");
			$.get('api/faculty.php', {
				university: $(this).val()
			})
			.done(function(res) {
				$('.faculty_list').append('<option value="">指定なし</option>');
				for (i = 0; i < res.length; i++) {
					var $div = $('<option></option>');
					$div.html(res[i].name);
					$('.faculty_list').append($div);
				}
			}).fail(function(res) {
				console.log('error');
			});
		}
	});

	$('.faculty_list').change(function() {
		$('.department_list > option').remove();

		if($(this).val() == ""){
			$('.department_list').attr("disabled", "disabled");
		} else {
			$('.department_list').removeAttr("disabled");
			$.get('api/department.php', {
				university: $('.university_list').val(),
				faculty: $(this).val()				
			})
			.done(function(res) {
				$('.department_list').append('<option value="">指定なし</option>');
				for (i = 0; i < res.length; i++) {
					var $div = $('<option></option>');
					$div.html(res[i].name);
					$('.department_list').append($div);
				}
			}).fail(function(res) {
				console.log('error');
			});
		}
	});
});