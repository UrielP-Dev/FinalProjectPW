

    <link rel="stylesheet" href="Home/stylesfooter.css">
    <footer>
        <div class="footer-container">
            <div class="row">
            <div class="col img">
                <img src="/resoures/logo.jpg" alt="Logo">
            </div>
            <div class="footer-content">
                <p>&copy; <span id="current-year"></span> Derechos de autor. Todos los derechos reservados.</p>
            </div>
            </div>
        </div>
    </footer>
    

    <script>
        // Script para obtener el año actual
        document.getElementById("current-year").textContent = new Date().getFullYear();
    </script>
</body>
</html>
