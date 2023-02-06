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
    name: null,
    budget: null,
    responsible_user: null,
    status: null
}

$(document).on("submit", "#addProjectForm", function (e) {
    e.preventDefault();
    let projectData = DashboardHelper.serializeObject($(this));
    postDataAdd.name = projectData.project_name;
    postDataAdd.budget = projectData.budget;
    postDataAdd.responsible_user = projectData.user_responsible;
    postDataAdd.status = projectData.status;
    (new Dashboard()).addProject();
})

function Dashboard() {
    
    this.addProject = () => {
        console.log(postDataAdd)
        DashboardClient.post(DashboardClient.domainUrl() + "/v1/add/project", postDataAdd)
            .then((response) => {
                if (response.status === true) {
                    toastr.info(response.message, "info", DashboardHelper.toastOption());
                    $("#close_1").click();
                    $(this).trigger("reset")
                    (new Dashboard().getProject());
                }
            })
            .catch((error) => {
                toastr.error(error.responseJSON.message, "error", DashboardHelper.toastOption());
            })
    };
    
    
    
}
