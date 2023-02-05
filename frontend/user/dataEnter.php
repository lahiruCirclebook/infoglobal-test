<!DOCTYPE html>
<html>

<head>
    <title>Infoglobal | Customer</title>


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>




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
    <section class="min-vh-100 mb-8">
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">

                    <div class="card z-index-0" style="width:120%">
                        <div class="card-header text-center pt-4">
                            <h5>Enter Your Details</h5>
                        </div>

                        <div class="card-body">
                            <form id="customer" class="form">
                                <div class="mb-3 form-field error success">
                                    <label for="nic">NIC:</label>
                                    <input type="text" class="form-control" placeholder="National Identity card Number" name="nic" id="nic" isRequired>
                                    <small></small>
                                </div>
                                <div class="mb-3 form-field error success">
                                    <label for="full_name">Full Name:</label>
                                    <textarea class="form-control" type="text" name="full_name" cols="10" rows="2" placeholder="Full Name" id="full_name" isRequired></textarea>
                                    <small></small>
                                </div>
                                <div class="mb-3 form-field error success">
                                    <label for="address">Address:</label>
                                    <textarea class="form-control" type="text" name="address" cols="10" rows="2" placeholder="Address" id="address" isRequired></textarea>
                                    <small></small>
                                </div>

                                <div class="mb-3 form-field error success">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" class="form-control" placeholder="Date Of Birth" name="dob" id="dob" isRequired>
                                    <small></small>
                                </div>
                                <div class="mb-3 form-field error success">
                                    <label for="religions">Religions:</label>
                                    <input type="text" class="form-control" placeholder="Religions" name="religions" id="religions" isRequired>
                                    <small></small>
                                </div>
                                <div class="mb-3 form-field error success">
                                    <label for="phone_no">Phone No:</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone_no" id="phone_no" isRequired>
                                    <small></small>
                                </div>

                                <div class="mb-3 form-field error success">
                                    <label for="date_of_registered">Date of Register:</label>
                                    <input type="date" class="form-control" placeholder="Date Of Register" name="date_of_registered" id="date_of_registered" isRequired>
                                    <small></small>
                                </div>



                                <div class="text-center form-field">
                                    <button type="submit" id="add_details" class="btn btn-dark w-100 my-4 mb-2">Add Details</button>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const nic = document.querySelector('#nic');
        const full_name = document.querySelector('#full_name');
        const address = document.querySelector('#address');
        const dob = document.querySelector('#dob');

        const religions = document.querySelector('#religions');
        const phone_no = document.querySelector('#phone_no');
        const date_of_registered = document.querySelector('#date_of_registered');

        const form = document.querySelector('#add_details');


        const checkNic = () => {

            let valid = false;

            const min = 10,
                max = 10;

            const nic = nic.value.trim();

            if (!isRequired(nic)) {
                showError(nic, 'NIC cannot be blank.');
            } else if (!isBetween(nic.length, min, max)) {
                showError(nic, `NIC number must be between ${min} and ${max} characters.`)
            } else {
                showSuccess(nic);
                valid = true;
            }
            return valid;
        };


        const checkFullName = () => {
            let valid = false;
            const full_name = full_name.value.trim();
            if (!isRequired(full_name)) {
                showError(full_name, 'Full Name cannot be blank.');
            } else {
                showSuccess(full_name);
                valid = true;
            }
            return valid;
        };


        const checkAddress = () => {
            let valid = false;


            const address = address.value.trim();

            if (!isRequired(address)) {
                showError(address, 'Address cannot be blank.');
            } else {
                showSuccess(address);
                valid = true;
            }

            return valid;
        };

        const checkDob = () => {
            let valid = false;

            const dob = dob.value.trim();


            if (!isRequired(dob)) {
                showError(dob, 'Dob cannot be blank.');
            } else {
                showSuccess(dob);
                valid = true;
            }

            return valid;
        };

        const checkReligions = () => {
            let valid = false;

            const religions = religions.value.trim();


            if (!isRequired(religions)) {
                showError(religions, 'Religions cannot be blank.');
            } else {
                showSuccess(religions);
                valid = true;
            }

            return valid;
        };



        const checkPhone = () => {

            let valid = false;

            const min = 10,
                max = 10;

            const phone_no = phone_no.value.trim();

            if (!isRequired(phone_no)) {
                showError(nic, 'Phone number cannot be blank.');
            } else if (!isBetween(phone_no.length, min, max)) {
                showError(nic, `Phone number must be between ${min} and ${max} characters.`)
            } else {
                showSuccess(nic);
                valid = true;
            }
            return valid;
        };

        const checkDateOfRegistered = () => {
            let valid = false;

            const date_of_registered = date_of_registered.value.trim();


            if (!isRequired(date_of_registered)) {
                showError(date_of_registered, 'Date of Registered cannot be blank.');
            } else {
                showSuccess(date_of_registered);
                valid = true;
            }

            return valid;
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
            let isCheckNic = checkNic(),
                isCheckFullName = checkFullName(),
                isCheckAddress = checkAddress(),
                isCheckDob = checkDob(),
                isCheckReligions = checkReligions(),
                isCheckPhone = checkPhone(),
                isCheckDateOfRegistered = checkDateOfRegistered();

            let isFormValid = isCheckNic &&
                isCheckFullName &&
                isCheckAddress &&
                isCheckDob &&
                isCheckReligions &&
                isCheckPhone &&
                isCheckDateOfRegistered;

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
                case 'nic':
                    checkNic();
                    break;
                case 'full_name':
                    checkFullName();
                    break;
                case 'address':
                    checkAddress();
                    break;
                case 'dob':
                    checkDob();
                    break;
                case 'religions':
                    checkReligions();
                    break;
                case 'phone_no':
                    checkPhone();
                    break;
                case 'date_of_registered':
                    checkDateOfRegistered();
                    break;
            }
        }));
    </script>




</body>

</html>