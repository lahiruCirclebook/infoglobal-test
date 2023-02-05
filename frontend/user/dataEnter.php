<!DOCTYPE html>
<html>

<head>
    <title>Infoglobal | Customer</title>


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="assets/css/toastr.css" rel="stylesheet" />
</head>

<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    :root {
        --error-color: #dc3545;
        --success-color: #28a745;
        --warning-color: #ffc107;
    }



    .form h1 {
        font-size: 1.5em;
        text-align: center;
        margin-bottom: 20px;

    }

    .form-field {
        margin-bottom: 5px;

    }

    .form-field label {
        display: block;
        color: #777;
        margin-bottom: 5px;
    }

    .form-field input {
        border: solid 2px #f0f0f0;
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 5px;
        font-size: 14px;
        display: block;
        width: 100%;
    }

    .form-field input:focus {
        outline: none;
    }

    .form-field.error input {
        border-color: var(--error-color);
    }

    .form-field.success input {
        border-color: var(--success-color);
    }


    .form-field small {
        color: var(--error-color);
    }
</style>

<body><br><br>

    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Enter Your Details</h5>
                    </div>
                    <div class="card-body">
                        <form id="customer" class="form">
                            <div class="mb-3 form-field">
                                <input type="text" class="form-control" placeholder="National Identity card Number" name="nic" id="nic">
                                <small></small>
                            </div>
                            <div class="mb-3 form-field">
                                <textarea class="form-control" type="text" name="full_name" cols="10" rows="2" placeholder="Full Name" id="full_name"></textarea>
                                <small></small>
                            </div>
                            <div class="mb-3 form-field">
                                <textarea class="form-control" type="text" name="address" cols="10" rows="2" placeholder="Address" id="address"></textarea>
                                <small></small>
                            </div>

                            <div class="mb-3 form-field">
                                <input type="date" class="form-control" placeholder="Date Of Birth" name="dob" id="dob">
                                <small></small>
                            </div>
                            <div class="mb-3 form-field">
                                <input type="text" class="form-control" placeholder="Religions" name="religions" id="religions">
                                <small></small>
                            </div>
                            <div class="mb-3 form-field">
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone_no" id="phone_no">
                                <small></small>
                            </div>

                            <div class="mb-3 form-field">
                                <input type="date" class="form-control" placeholder="Date Of Register" name="date_of_registered" id="date_of_registered">
                                <small></small>
                            </div>



                            <div class="text-center form-field">
                                <button type="submit" id="add_details" class="btn btn-dark w-100 my-4 mb-2">Add Details</button>
                                <center>
                                    <button href="" class="btn btn-danger w-100 my-2 mb-2">Cancel</button>
                                </center>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const nic = document.querySelector('#nic');
        const full_name = document.querySelector('#full_name');
        const address = document.querySelector('#address');
        const dob = document.querySelector('#dob');

        const form = document.querySelector('#add_details');


        const checkUsername = () => {

            let valid = false;

            const min = 3,
                max = 25;

            const username = usernameEl.value.trim();

            if (!isRequired(username)) {
                showError(usernameEl, 'Username cannot be blank.');
            } else if (!isBetween(username.length, min, max)) {
                showError(usernameEl, `Username must be between ${min} and ${max} characters.`)
            } else {
                showSuccess(usernameEl);
                valid = true;
            }
            return valid;
        };


        const checkEmail = () => {
            let valid = false;
            const email = emailEl.value.trim();
            if (!isRequired(email)) {
                showError(emailEl, 'Email cannot be blank.');
            } else if (!isEmailValid(email)) {
                showError(emailEl, 'Email is not valid.')
            } else {
                showSuccess(emailEl);
                valid = true;
            }
            return valid;
        };

        const checkPassword = () => {
            let valid = false;


            const password = passwordEl.value.trim();

            if (!isRequired(password)) {
                showError(passwordEl, 'Password cannot be blank.');
            } else if (!isPasswordSecure(password)) {
                showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
            } else {
                showSuccess(passwordEl);
                valid = true;
            }

            return valid;
        };

        const checkConfirmPassword = () => {
            let valid = false;
            // check confirm password
            const confirmPassword = confirmPasswordEl.value.trim();
            const password = passwordEl.value.trim();

            if (!isRequired(confirmPassword)) {
                showError(confirmPasswordEl, 'Please enter the password again');
            } else if (password !== confirmPassword) {
                showError(confirmPasswordEl, 'The password does not match');
            } else {
                showSuccess(confirmPasswordEl);
                valid = true;
            }

            return valid;
        };

        const isEmailValid = (email) => {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        };

        const isPasswordSecure = (password) => {
            const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            return re.test(password);
        };

        const isRequired = value => value === '' ? false : true;
        const isBetween = (length, min, max) => length < min || length > max ? false : true;


        const showError = (input, message) => {
            // get the form-field element
            const formField = input.parentElement;
            // add the error class
            formField.classList.remove('success');
            formField.classList.add('error');

            // show the error message
            const error = formField.querySelector('small');
            error.textContent = message;
        };

        const showSuccess = (input) => {
            // get the form-field element
            const formField = input.parentElement;

            // remove the error class
            formField.classList.remove('error');
            formField.classList.add('success');

            // hide the error message
            const error = formField.querySelector('small');
            error.textContent = '';
        }


        form.addEventListener('submit', function(e) {
            // prevent the form from submitting
            e.preventDefault();

            // validate fields
            let isUsernameValid = checkUsername(),
                isEmailValid = checkEmail(),
                isPasswordValid = checkPassword(),
                isConfirmPasswordValid = checkConfirmPassword();

            let isFormValid = isUsernameValid &&
                isEmailValid &&
                isPasswordValid &&
                isConfirmPasswordValid;

            // submit to the server if the form is valid
            if (isFormValid) {

            }
        });


        const debounce = (fn, delay = 500) => {
            let timeoutId;
            return (...args) => {
                // cancel the previous timer
                if (timeoutId) {
                    clearTimeout(timeoutId);
                }
                // setup a new timer
                timeoutId = setTimeout(() => {
                    fn.apply(null, args)
                }, delay);
            };
        };

        form.addEventListener('input', debounce(function(e) {
            switch (e.target.id) {
                case 'username':
                    checkUsername();
                    break;
                case 'email':
                    checkEmail();
                    break;
                case 'password':
                    checkPassword();
                    break;
                case 'confirm-password':
                    checkConfirmPassword();
                    break;
            }
        }));
    </script>
</body>

</html>