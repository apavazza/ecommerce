import { getCookie } from "/js_scripts/cookie.js";

const customerCookie = getCookie("customer_session");
if(!customerCookie){
    window.location.href = "/sign_in.php";
}

const  usernameButton = document.getElementById("edit-username");
usernameButton.addEventListener("click", function(){
    const newUsername = prompt("New username");
    const usernameField = document.getElementById("username-value");
    usernameField.innerText = newUsername;
})

const  emaileButton = document.getElementById("edit-email");
emaileButton.addEventListener("click", function(){
    const newEmail= prompt("New email address");
    const emailField = document.getElementById("email-value");
    emailField.innerText = newEmail;
})

const  firstNameButton = document.getElementById("edit-first-name");
firstNameButton.addEventListener("click", function(){
    const newFirstName= prompt("New first name");
    const firstNameField = document.getElementById("first-name-value");
    firstNameField.innerText = newFirstName;
})

const  lastNameButton = document.getElementById("edit-last-name");
lastNameButton.addEventListener("click", function(){
    const newLastName= prompt("New last name");
    const lastNameField = document.getElementById("last-name-value");
    lastNameField.innerText = newLastName;
})

const  dateOfBirthButton = document.getElementById("edit-date-of-birth");
dateOfBirthButton.addEventListener("click", function(){
    const newDateOfBirth= prompt("New date of birth");
    const dateOfBithField = document.getElementById("date-of-birth-value");
    dateOfBithField.innerText = newDateOfBirth;
})

const  addressButton = document.getElementById("edit-address");
addressButton.addEventListener("click", function(){
    const newAddress= prompt("New address");
    const addressField = document.getElementById("address-value");
    addressField.innerText = newAddress;
})

const avatarButton = document.getElementById("edit-avatar");
avatarButton.addEventListener("click", function () {
    const newAvatarInput = document.getElementById("new-avatar");
    const avatarImg = document.getElementById("avatar-img");

    // Check if a file is selected
    if (newAvatarInput.files.length > 0) {
        // Create a FileReader to read the selected file
        const reader = new FileReader();

        // Define the onload event handler
        reader.onload = function (e) {
            // Update the source attribute of the avatar image with the data URL
            avatarImg.setAttribute("src", e.target.result);
        };

        // Read the selected file as a data URL
        reader.readAsDataURL(newAvatarInput.files[0]);
    } else {
        alert("Please select a file.");
    }
});
