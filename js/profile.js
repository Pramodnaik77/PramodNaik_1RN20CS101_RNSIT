function updateProfileDetails($firstname, $lastname, $phone, $gender) {
    $.ajax({
        type: 'POST',
        url: "http:localhost/guvi/php/profile.php",
        data: { firstname:$firstname,  lastnamedob:  $lastname, phone: $phone,gender: $gender },
        success: function(response) {
            console.log('Profile update success:', response);

        },
        error: function(error) {
            console.error('Profile update error:', error);
        }
    });
}

$('#editProfile').on('click', function() {
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var phone = $('#phone').val();
    var gender = $('#gender').val();

    EditProfile(firstname, lastname, phone, gender);

});