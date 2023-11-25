window.onload = () => {
    profileContainer = document.getElementsByClassName('profile');
    addressContainer = document.getElementsByClassName('address');
    accountContainer = document.getElementsByClassName('account');

    profileContainer[0].style.display = 'block';
    addressContainer[0].style.display = 'none';
    accountContainer[0].style.display = 'none';
}

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

function switchToAddress() {
    profileContainer[0].style.display = 'none';
    addressContainer[0].style.display = 'block';
    accountContainer[0].style.display = 'none';
}

function switchToProfile() {
    profileContainer[0].style.display = 'block';
    addressContainer[0].style.display = 'none';
    accountContainer[0].style.display = 'none';
}

function switchToAccount() {
    profileContainer[0].style.display = 'none';
    addressContainer[0].style.display = 'none';
    accountContainer[0].style.display = 'block';
}

$(document).ready(function() {
    $('.profile-continue-button').click(function() {
        firstname = document.getElementsByName('user-firstname-field')[0].value;
        middlename = document.getElementsByName('user-middlename-field')[0].value;
        lastname = document.getElementsByName('user-lastname-field')[0].value;
        email = document.getElementsByName('user-email-field')[0].value;
        contact = document.getElementsByName('user-contact-field')[0].value;

        city = document.getElementsByName('user-city-field')[0].value;
        municipality = document.getElementsByName('user-municipality-field')[0].value;
        barangay = document.getElementsByName('user-barangay-field')[0].value;
        street = document.getElementsByName('user-street-field')[0].value;
        zipcode = document.getElementsByName('user-zipcode-field')[0].value;
        
        
        username = document.getElementsByName('user-username-field')[0].value;
        password = document.getElementsByName('user-password-field')[0].value;
        confirmpassword = document.getElementsByName('user-confirm-password-field')[0].value;

        if(firstname != "" && middlename != "" && lastname != "" && email != "" && contact != "" &&
            city != "" && municipality != "" && barangay != "" && street != "" && zipcode != "" &&
            username != "" && password != "" && confirmpassword != ""
        ){

            if(password == confirmpassword){
                $.ajax({ 
                    type: 'POST',
                    url: '../getdata/getexistinguser.php', 
                    data: {
                        'username':username
                    },
                    success: function(data){
                        var obj = jQuery.parseJSON(data);
                        if(obj == "Existing"){
                            Swal.fire({
                                title: "User Existing.",
                                icon: "error"
                            });
                        }else {
                            $.ajax({
                                type: 'POST',
                                url: 'insertuser.php',
                                data: {
                                    "user-firstname-field": firstname,
                                    "user-middlename-field": middlename,
                                    "user-lastname-field": lastname,
                                    "user-email-field": email,
                                    "user-contact-field": contact,
                                    "user-city-field": city,
                                    "user-municipality-field": municipality,
                                    "user-barangay-field": barangay,
                                    "user-street-field": street,
                                    "user-zipcode-field": zipcode,
                                    "user-username-field": username,
                                    "user-password-field": password,
                                    "user-confirm-password-field": confirmpassword
                                }
                            });
                            Swal.fire({
                                title: "Registered Succesfully.",
                                icon: "success"
                            }).then(() => {
                                window.location.href='../index.html'
                            });
                        }
                    }
                });
            }else {
                Swal.fire({
                    title: "Password do not match.",
                    icon: "error"
                });
            }

        }else {
            Swal.fire({
                title: "Some field(s) are empty.",
                icon: "error"
            });
        }
    });
});