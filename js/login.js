$(document).on('click', '#loginBtn', function () {
      $username= $('#username').val(),
      $password= $('#password').val()

    $.ajax({
        type: 'POST',
        url: "http:localhost/guvi/php/login.php",
        dataType:"JSON",
        data: {username:$username, passwrod:$password},
        success: function (data) {
            localStorage.setItem('email',username);
            response=JSON.parse(data)
            if (response.statusCode === 200) {
                alert('Login SuccessFul');
                window.location.href = 'profile.html';
            } else {
                alert('Login failed. Please check your credentials.');
            }
        }
    });
});