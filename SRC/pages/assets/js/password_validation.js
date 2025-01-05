// Function to validate the password
function validatePassword() {
    // Get password and confirm password values
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    // Regular expressions for validation
    var minLengthPattern = /.{8,}/; // Minimum 8 characters
    var upperCasePattern = /[A-Z]/; // At least one uppercase letter
    var numberPattern = /[0-9]/; // At least one number
    var specialCharPattern = /[!@#$%^&*(),.?":{}|<>]/; // At least one special character

    // Validate password length
    if (!minLengthPattern.test(password)) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    // Validate uppercase letter
    if (!upperCasePattern.test(password)) {
        alert("Password must contain at least one uppercase letter.");
        return false;
    }

    // Validate number
    if (!numberPattern.test(password)) {
        alert("Password must contain at least one number.");
        return false;
    }

    // Validate special character
    if (!specialCharPattern.test(password)) {
        alert("Password must contain at least one special character.");
        return false;
    }

    // Check if password and confirm password match
    if (password !== confirmPassword) {
        alert("Password and Confirm Password must be the same.");
        return false;
    }

    alert("Password validated successfully!");
    return true;
}

// Add event listener to form submission
document.getElementById("registerForm").addEventListener("submit", function(event) {
    if (!validatePassword()) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});
