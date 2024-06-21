const passwordField1 = document.getElementById("password");
const passwordField2 = document.getElementById("password2");
const showPasswordButton = document.getElementById("showPasswordButton");

showPasswordButton.addEventListener("click", function() {
  // Toggle password field type for both fields
  const newType = (passwordField1.type === "password") ? "text" : "password";
  passwordField1.type = newType;
  passwordField2.type = newType;

  // Update button text based on new type
  showPasswordButton.textContent = (newType === "text") ? "Hide Passwords" : "Show Passwords";
});

const form = document.getElementById("registrationForm");

form.addEventListener("submit", function(event) {
  // Email validation
  const email = document.getElementById("email").value.trim();
  const email2 = document.getElementById("email2").value.trim();
  const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (!emailRegex.test(email)) {
    alert("Invalid email format. Please enter a valid email address.");
    event.preventDefault();
    return false;
  }

  if (email !== email2) {
    alert("Email addresses do not match. Please enter the same email address in both fields.");
    event.preventDefault();
    return false;
  }

  // Password validation (medium strength)
  const password = document.getElementById("password").value.trim();
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~!@#$%^&*_-]).{8,}$/; // Includes at least 1 digit, 1 lowercase, 1 uppercase, 1 special character, and minimum 8 characters

  if (!passwordRegex.test(password)) {
    alert("Password must be at least 8 characters long and contain a mix of uppercase and lowercase letters, numbers, and special characters.");
    event.preventDefault();
    return false;
  }

  if (password !== document.getElementById("password2").value.trim()) {
    alert("Passwords do not match. Please enter the same password in both fields.");
    event.preventDefault();
    return false;
  }

  // Phone number validation (8 digits, numbers only)
  const phoneNumber = document.getElementById("phone_number").value.trim();
  const phoneRegex = /^\d{8}$/;

  if (!phoneRegex.test(phoneNumber)) {
    alert("Invalid phone number. Please enter a valid 8-digit phone number.");
    event.preventDefault();
    return false;
  }

  // Name validation (no symbols or special characters)
  const firstName = document.getElementById("first_name").value.trim();
  const lastName = document.getElementById("last_name").value.trim();
  const nameRegex = /^[a-zA-Z]+$/;

  if (!nameRegex.test(firstName) || !nameRegex.test(lastName)) {
    alert("First name and last name can only contain letters (a-z and A-Z).");
    event.preventDefault();
    return false;
  }

  const age = document.getElementById("age")


  
});
