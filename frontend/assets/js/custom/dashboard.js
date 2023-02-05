
(new Dashboard()).getDashboard();
function Dashboard() {
    this.getDashboard = () => {
        DashboardClient.get(DashboardClient.domainUrl()+"/get/customers")
            .then((response) => {
                if (response.status === true){
                   console.log(response.customer);
                    $.each(response.customer, function (key,val){
                      
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
}