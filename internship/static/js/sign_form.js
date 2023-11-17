$(function () {
    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "1900:c",
    });
});

var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function () {
    document.getElementById("message").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
myInput.onblur = function () {
    document.getElementById("message").style.display = "none";
}
// When the user starts to type something inside the password field
myInput.onkeyup = function () {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }
    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }
    // Validate length
    if (myInput.value.length >= 10) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}

function validateEmailmatch() {
    // Get the values of both email inputs
    var email = document.getElementById("email").value;
    var repeatedEmail = document.getElementById("remail").value;
    // Check if the values match
    if (email === repeatedEmail) {
        // The emails match, clear the error message
        return true;
    } else {
        // The emails do not match, display an error message
        alert("The emails do not match.");
        return false;
    }
}

function validatePassword() {
    // Get the values of both password inputs
    var password = document.getElementById("password").value;
    var repeatedpassword = document.getElementById("rpassword").value;
    // Check if the values match
    if (password === repeatedpassword) {
        // The passwords match, clear the error message
        return true;
    } else {
        // The passwords do not match, display an error message
        alert("The passwords do not match.");
        return false;
    }
}

// Function to validate email format
function validateEmailformat() {
    var emailInput = document.getElementById("email").value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(emailInput)) {
        // Invalid email format
        alert("Please enter a valid email address.");
        return false;
    }
    else {
        return true;
    }
}

document.getElementById("signup_form").addEventListener("submit", function (e) {
    const isValid = validatePassword() && validateEmailformat() && validateEmailmatch()
    if (!isValid) {
        e.preventDefault()
    }
    return isValid;
})


const doctorYesRadioButton = document.getElementById('doctorYes');
const additionalFieldContainer = document.getElementById('additionalFieldContainer');
const additionalInputFieldContainer = document.getElementById('additionalInputFieldContainer');
const areaContainer = document.getElementById("areaContainer");

doctorYesRadioButton.addEventListener('change', function() {
  if (this.checked) {
    additionalFieldContainer.style.display = 'table-row';
    additionalInputFieldContainer.style.display = 'table-row'; // Show additional input field
    areaContainer.style.display = 'table-row';
  } else {
    additionalFieldContainer.style.display = 'none';
    additionalInputFieldContainer.style.display = 'none'; // Hide additional input field
    areaContainer.style.display = 'none';
  }
});

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }