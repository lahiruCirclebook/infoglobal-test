<!DOCTYPE html>
<html>

<head>
    <title>Infoglobal | Customer</title>


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

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
                            <form id="customer">
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

    <script src="../assets/js/plugins/jquery.js"></script>
    <script src="../assets/js/plugins/toastr.min.js"></script>
    <script src="../assets/js/custom/dashboard-client.js"></script>
    <script src="../assets/js/custom/customer.js"></script>

</body>

</html>