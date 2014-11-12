$(function(){

  function statusChangeCallback(response) {
   console.log('statusChangeCallback');
   console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.

    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.

    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
  	FB.getLoginStatus(function(response) {
  		statusChangeCallback(response);
  	});
  }

  window.fbAsyncInit = function() {
  	FB.init({
  		appId      : '1505753603039071',
      cookie     : true,  // enable cookies to allow the server to access 
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.1' // use version 2.1
    });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

};

  // Load the SDK asynchronously
  (function(d, s, id) {
  	var js, fjs = d.getElementsByTagName(s)[0];
  	if (d.getElementById(id)) return;
  	js = d.createElement(s); js.id = id;
  	js.src = "//connect.facebook.net/en_US/sdk.js";
  	fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
  	console.log('Welcome!  Fetching your information.... ');
  	FB.api('/me', function(response) {
      console.log(response);
      document.getElementById("facebook").innerHTML='<div class="panel-body"><div class="row"><form role="form" enctype="multipart/form-data" method="post" action="register2.php"><div class="col-lg-12"><div class="form-group"><label>ユーザー名</label><input name="login_name" class="form-control" required><p class="help-block">※半角英数字で入力してください。</p></div><div class="form-group"><label>メアド</label><input name="address" class="form-control" type="email"><p class="help-block">※普段お使いのメールアドレスをご記入ください。</p></div><div class="form-group"><label>パスワード</label><input name="pwd" class="form-control" type="password" required><p class="help-block">※半角英数字で6文字以上で入力してください。</p><input name="pwd2" class="form-control" type="password" required><p class="help-block">※確認のため再入力。</p></div><div class="form-group"><label>学年</label><select name="grade" class="form-control"><option value="">指定なし</option><option>大学1年</option><option>大学2年</option><option>大学3年</option><option>大学4年</option><option>大学5年</option><option>大学6年</option><option>その他</option></select></div><div class="form-group"><label>大学</label><select name="university" class="form-control university_list"></select></div><div class="form-group"><label>学部等</label><select name="faculty" class="form-control faculty_list" disabled="disable"></select></div><div class="form-group"><label>学科等</label><select name="department" class="form-control department_list" disabled="disable"></select></div></div><div align="center"><button type="submit" class="btn btn-default">登録</button><button type="reset" class="btn btn-default">リセット</button></div></form></div></div>';
      var $link = $('<input type="hidden" name="facebook_link" value="'+response.link+ '">');
      $('form').append($link);
      $('input[name="address"').val(response.email);

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
}
});

