document.addEventListener("DOMContentLoaded", function() {
    // Megkeressük a modal panelt
    var modal = document.getElementById('loginModal');

    // Ellenőrizzük, hogy megtaláltuk-e a modal panelt
    if (modal) {
        // Get the <span> element that closes the modal
        var span = modal.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Handle form submission
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission behavior
            // Add your login logic here
            alert("Login form submitted!");
            modal.style.display = "none"; // Close the modal after submission
        });
    }

    // Megkeressük a "Bejelentkezés" gombot
    var loginBtn = document.getElementById("loginButton");
    
    // Ellenőrizzük, hogy megtaláltuk-e a gombot
    if (loginBtn) {
        // Ha megtaláltuk, hozzáadjuk az eseménykezelőt a kattintás eseményhez
        loginBtn.addEventListener("click", function(event) {
            event.preventDefault(); // Megakadályozzuk az alapértelmezett működést (pl. oldal újratöltése)
            modal.style.display = "block"; // Megjelenítjük a modal popupot
        });
    }
});
