
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
                                    
                                    <td>                       
                                        <svg onclick="editEmp(${val.id})" style="cursor: pointer; margin-right: 10px; color: #00c292;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        <svg onclick="deleteEmp(${val.id})" style="cursor: pointer; color: #00c292;" xmlns="http://www.w3.org/2000/svg"  width="20" height="20" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">       <rect x="0" y="0" width="24" height="24"/>       <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>       <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>   </g></svg>                       
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