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