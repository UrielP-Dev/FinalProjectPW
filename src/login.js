$(document).ready(function() {
    $("#login-form").on('submit', function(event) {

        event.preventDefault(); // Prevent the form from submitting

        // Definition of the alert to show error messages
        const errorAlert = $('#error-alert')

        // Check if email is empty or password has the correct length
        const email = $('#user-email').val().trim();
        const password = $('#password').val();
        const loginAsAdmin = $('#admin-login').is(':checked');

        if (email === '') {
            errorAlert.text('El correo electronico no puede estar vacio');
            return;
        }

        if (!validateEmail(email)) {
            errorAlert.text('El correo electronico proporcionado no es valido');
            return;
        }

        if (password.length < 8) {
            errorAlert.text('La contraseña debe de contener al menos 8 caracteres');
            return;
        } 

        // Implementation of ajax
        $.ajax({
            type: 'POST',
            url: '../Access/Login_Process.php',
            data: {
                'user-email': email,
                'password': password,
                'admin-login': loginAsAdmin
            },
            success: function(response) {
                if (response.status === 1) {
                    errorAlert.text(response.message);
                    return;
                }

            },
            error: function(xhr, status, message) {
            }
        });

    });
});

const validateEmail = (email) => {
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
  };