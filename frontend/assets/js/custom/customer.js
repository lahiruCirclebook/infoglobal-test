DashboardHelper.authAlive()
$(document).on("submit", "#customer", function (e) {
    e.preventDefault()
    let loginData = DashboardHelper.serializeObject($(this));
    let postData = {
        nic: loginData.nic,
        full_name: loginData.full_name,
        address: loginData.address,
        dob: loginData.dob,
        religions: loginData.religions,
        phone_no: loginData.phone_no,
        date_of_registered: loginData.date_of_registered,
    }

    DashboardClient.post(DashboardClient.domainUrl() + "/v1/customer", postData)
        .then((response) => {
            if (response.status === true) {
              
                toastr.info(response.message, "info", DashboardHelper.toastOption());
               
            }
        })
        .catch((error) => {
            toastr.error(error.responseJSON.message, "error", DashboardHelper.toastOption());
        })
});