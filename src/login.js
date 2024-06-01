$(document).ready(function() {
    $("#login-form").on('submit', function(event) {
        // Check if username is empty or password has the correct length
        const username = $('#username').val().trim();
        const password = $('#password').val();

        if (username === '') {
            alert('El Nombre de Usuario no puede estar vacio');
            event.preventDefault();
        }

        if (password.length < 8) {
            alert('La contraseña debe de contener al menos 8 caracteres');
            event.preventDefault();
        }

    });
});