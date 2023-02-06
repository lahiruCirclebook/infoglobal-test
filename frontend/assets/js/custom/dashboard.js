
(new Dashboard()).getDashboard();
function Dashboard() {
    this.getDashboard = () => {
        $("#projectData").html('')
        DashboardClient.get(DashboardClient.domainUrl()+"/get/customers")
            .then((response) => {
                if (response.status === true){
                   console.log(response.data);
                    $.each(response.data, function (key,val){
                      
                        $("#projectData").append(`
                            <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">${val.id ? val.id : '--'}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">${val.nic ? val.nic : '--'}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">${val.full_name ? val.full_name : '--'}</p>
                                    </td>     
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">${val.address ? val.address : '--'}</p>
                                    </td>
                                    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">${val.dob ? val.dob : '--'}</p>
                                    </td>     
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">${val.religions ? val.religions : '--'}</p>
                                    </td>
                                    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">${val.phone_no ? val.phone_no : '--'}</p>
                                    </td>     
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">${val.date_of_registered ? val.date_of_registered : '--'}</p>
                                    </td>
                                    
                                    <td>
                                    <div data-toggle="modal" data-target="#editProject" style="display: inline">
                                        <a class="btn btn-link text-dark px-3 mb-0" href="javascript: editProject(${val.id});"  ><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                                    </div>                                                                              
                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript: deleteProject(${val.id});"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                                    </td>                                           
                                        
                                                                  
                                   
                                </tr>
                        `);
                    });
                    
                  
                }
            })
            .catch((error) => {
                DashboardHelper.preLoaderHide();
                console.log(error.responseJSON)
                if(error.status === 401){
                    DashboardHelper.unAuthorize();
                }
            })
    };

    this.updateProject = () => {
        console.log(postDataEdit)
        DashboardClient.put(DashboardClient.domainUrl() + "/update/customer", postDataEdit)
            .then((response) => {
                if (response.status === true) {
                    toastr.info(response.message, "info", DashboardHelper.toastOption());
                    (new Dashboard()).getDashboard();
                    $("#close_2").click();
                   
                }
            })
            .catch((error) => {
                //toastr.error(error.responseJSON.message, "error", DashboardHelper.toastOption());
            })
    };

    this.getProjectById = (id) => {
        DashboardClient.get(DashboardClient.domainUrl() + "/get/customers/" + id)
            .then((response) => {
                if (response.status === true) {
                    let data = response.data;
                    $("#nic").val(data.nic)
                    $("#full_name").val(data.full_name)
                    $("#address").val(data.address)
                    $('#dob').val(data.dob)
                    $("#religions").val(data.religions)
                    $('#phone_no').val(data.phone_no)
                    $('#date_of_registered').val(data.date_of_registered)
                }
            })
            .catch((error) => {
                console.log(error.responseJSON)
            })
    };

    this.deleteProject = (id) => {
        console.log(id)
        DashboardClient.delete(DashboardClient.domainUrl() + "/delete/customer/" + id)
            .then((response) => {
                if (response.status === true) {
                    toastr.success(response.message, "success", DashboardHelper.toastOption());
                  
                    window.location.reload();
                }
            })
            .catch((error) => {
                toastr.error(error.responseJSON.message, "error", DashboardHelper.toastOption());
            })
    };
}

$(document).on("submit", "#updateProjectForm", function (e) {
    e.preventDefault();
    let projectData = DashboardHelper.serializeObject($(this));
    postDataEdit.nic = projectData.nic;
    postDataEdit.full_name = projectData.full_name;
    postDataEdit.address = projectData.address;
    postDataEdit.dob = projectData.dob;
    postDataEdit.religions = projectData.religions;
    postDataEdit.phone_no = projectData.phone_no;
    postDataEdit.date_of_registered = projectData.date_of_registered;
    (new Dashboard()).updateProject();
})


let postDataEdit = {
    id: null,
    nic: null,
    full_name: null,
    address: null,
    dob: null,
    religions: null,
    phone_no: null,
    date_of_registered: null
}

function editProject(id) {
    postDataEdit.id = id;
    (new Dashboard()).getProjectById(id);
}

function deleteProject(id) {
    (new Dashboard()).deleteProject(id);
}

