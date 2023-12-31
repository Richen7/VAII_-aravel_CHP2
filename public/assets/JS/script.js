const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu")

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("activate");
})

document.querySelectorAll(".nav-link").forEach(n = n.addEventListener(".click", () => {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}))

// adder checker
function validateAdderForm(event) {
    event.preventDefault();

    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;
    var author = document.getElementById('author').value;
    var price = document.getElementById('price').value;

    if (title === '' || description === '' || author === '' || price === '') {
        alert('Please fill in all fields');
        return false;
    }

    var isValidPrice = !isNaN(parseFloat(price)) && isFinite(price);

    if (!isValidPrice) {
        alert('Zle zadaná hodnota, zadajte číslo vo formáte 00.00');
        return false;
    }

    document.getElementById('addBookForm').submit();
}

function validateEditForm(event) {
    event.preventDefault();

    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;
    var author = document.getElementById('author').value;
    var price = document.getElementById('price').value;

    if (title === '' || description === '' || author === '' || price === '') {
        alert('Please fill in all fields');
        return false;
    }

    var isValidPrice = !isNaN(parseFloat(price)) && isFinite(price);

    if (!isValidPrice) {
        alert('Please enter a valid numeric price');
        return false;
    }

    document.getElementById('editBookForm').submit();
}

function validateRegistrationForm(event) {
    event.preventDefault();

    var name = document.getElementsByName('name')[0].value;
    var email = document.getElementById('email').value;
    var password = document.getElementsByName('password')[0].value;

    if (name === '' || email === '' || password === '') {
        alert('Please fill in all fields');
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Prosím vložte valídnu emailovú adresu');
        return false;
    }

    document.getElementById('registrationForm').submit();
}
