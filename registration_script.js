
function calculateAge(dob) {
    var currentDate = new Date();
    var selectedDate = new Date(dob);
    var age = currentDate.getFullYear() - selectedDate.getFullYear();
    var monthDiff = currentDate.getMonth() - selectedDate.getMonth();

    if (monthDiff < 0 || (monthDiff === 0 && currentDate.getDate() < selectedDate.getDate())) {
        age--;
    }

    return age;
}


function validateForm() {

    var dobInput = document.getElementById('dob');
    var passwordInput = document.getElementById('password');
    var confirmPasswordInput = document.getElementById('confirmPassword');


    var age = calculateAge(dobInput.value);


    if (age < 18) {
        alert('You must be 18 years or older to register.');
        return false;
    }


    if (passwordInput.value !== confirmPasswordInput.value) {
        alert('Passwords do not match.');
        return false;
    }


    return true;
}
