document.addEventListener("DOMContentLoaded", () => {
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("activate");
    });
});

document.querySelectorAll(".nav-link").forEach(function(n) {
    n.addEventListener("click", function() {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
    });
});


// adder checker
function validateAdderForm(event) {
    event.preventDefault();

    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;
    var author = document.getElementById('author').value;
    var price = document.getElementById('price').value;

    if (title === '' || description === '' || author === '' || price === '') {
        alert('Vyplnťe všetky polia');
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
        alert('Vyplnťe všetky polias');
        return false;
    }

    var isValidPrice = !isNaN(parseFloat(price)) && isFinite(price);

    if (!isValidPrice) {
        alert('Zle zadaná hodnota, zadajte číslo vo formáte 00.00');
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
        alert('Vyplnťe všetky polia');
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Prosím vložte valídnu emailovú adresu');
        return false;
    }

    document.getElementById('registrationForm').submit();
}

function validateUserUpdateForm(event) {
    event.preventDefault();

    var name = document.getElementById('name').value;
    var password = document.getElementById('password').value;
    var password_confirmation = document.getElementById('password_confirmation').value;

    if (name.trim() === '') {
        alert('Vlož použivateľské meno!');
        return false;
    }

    if (password !== '') {
        if (password.length < 5) {
            alert('Heslo musí byť dlhé aspoň 5 znakov.');
            return false;
        }

        if (password !== password_confirmation) {
            alert('Heslá sa nezhodujú!');
            return false;
        }
    }

    document.getElementById('userUpdateForm').submit();
}

function confirmDeletion() {
    return confirm('Ste si istý že chcete zmazať účet ?');
}

function validateCheckoutForm(event) {
    event.preventDefault();

    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var street = document.getElementById('street').value;
    var city = document.getElementById('city').value;
    var note = document.getElementById('note').value;

    if (firstname.trim() === '') {
        alert('Vložte svoje meno!');
        return false;
    }

    if (lastname.trim() === '' && lastname.length > 5) {
        alert('Vložte svoje priezvisko!');
        return false;
    }

    if (email.trim() === '') {
        alert('Vložte svoj e-mail!');
        return false;
    } else if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
        alert('Vložte platný e-mail!');
        return false;
    }

    if (phone.trim() === '' && phone.length < 9) {
        alert('Vložte svoje telefónne číslo!');
        return false;
    }

    if (street.trim() === '' && street.length < 5) {
        alert('Vložte svoju ulicu!');
        return false;
    }

    if (city.trim() === '' && city.length < 3) {
        alert('Vložte svoje mesto!');
        return false;
    }

    document.getElementById('checkout-form').submit();
}

//-------------//

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $(".hamburger").on("click", function() {
        $(this).toggleClass("active");
        $(".nav-menu").toggleClass("active");
    });

    $(".nav-link").on("click", function() {
        $(".hamburger").removeClass("active");
        $(".nav-menu").removeClass("active");
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function updateCartInfo() {
        $.ajax({
            url: '/cart-info',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('.cart-items-count').text(data.count);
                $('.cart-total-price').text(data.total + ' €');
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    updateCartInfo();
    setInterval(updateCartInfo, 10000);

    $(document).on('click', '.add-to-cart-btn', function(e) {
        e.preventDefault();
        const bookId = $(this).data('book-id');

        $.ajax({
            type: "POST",
            url: `/cart/add/${bookId}`,
            data: { bookId: bookId },
            success: function(data) {
                updateCartInfo();
            },
            error: function(response) {
                alert('Error adding item to cart');
            }
        });
    });
});
