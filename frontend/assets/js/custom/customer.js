/*DashboardHelper.authAlive()
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
});*/

DashboardHelper.preLoaderShow();

let postDataAdd = {
    nic: null,
    full_name: null,
    address: null,
    dob: null,
    religions: null,
    phone_no: null,
    date_of_registered: null
}

$(document).on("submit", "#customer", function (e) {
    e.preventDefault();
    let customerData = DashboardHelper.serializeObject($(this));
    postDataAdd.nic = customerData.nic;
    postDataAdd.full_name = customerData.full_name;
    postDataAdd.address = customerData.address;
    postDataAdd.dob = customerData.dob;
    postDataAdd.religions = customerData.religions;
    postDataAdd.phone_no = customerData.phone_no;
    postDataAdd.date_of_registered = customerData.date_of_registered;
    (new Dashboard()).addCustomer();
})

function Dashboard() {
    
    this.addCustomer = () => {
        console.log(postDataAdd)
        DashboardClient.post(DashboardClient.domainUrl() + "/v1/customer", postDataAdd)
            .then((response) => {
                if (response.status === true) {
                    toastr.info(response.message, "info", DashboardHelper.toastOption());
                    //$("#close_1").click();
                    $(this).trigger("reset")
                    //(new Dashboard().getProject());
                }
            })
            .catch((error) => {
                //toastr.error(error.responseJSON.message, "error", DashboardHelper.toastOption());
            })
    };
    
    
    
}
