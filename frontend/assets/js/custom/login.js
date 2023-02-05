DashboardHelper.authAlive()
$(document).on("submit","#login",function (e){
    e.preventDefault()
    let loginData = DashboardHelper.serializeObject($(this));
    let postData = {
        email: loginData.email,
        password: loginData.password
    }

    DashboardClient.post(DashboardClient.domainUrl()+"/v1/login", postData)
        .then((response) => {
            if (response.status === true && response.data === 'admin'){

                DashboardHelper.setAccessToken(response.token);
                toastr.info(response.message, "info", DashboardHelper.toastOption());
                window.location.href = "user/index.php";
                
            } else if (response.status === true && response.data === 'user') {
                
                DashboardHelper.setAccessToken(response.token);
                toastr.info(response.message, "info", DashboardHelper.toastOption());
                window.location.href = "dataEnter.php";
            }
          
        })
        .catch((error) => {
            toastr.error(error.responseJSON.message, "error", DashboardHelper.toastOption());
        })
});