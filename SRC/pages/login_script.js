document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#loginForm");

    loginForm.addEventListener("submit", (e) => {
        const email = document.querySelector("#email").value.trim();
        const password = document.querySelector("#password").value.trim();

        // Client-side validation
        if (email === "" || password === "") {
            alert("Email and Password cannot be empty!");
            e.preventDefault();
            return;
        }

        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            e.preventDefault();
            return;
        }
    });
});