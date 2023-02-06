DashboardHelper.authAlive()
$(document).on("submit", "#register", function (e) {
    e.preventDefault()
    let loginData = DashboardHelper.serializeObject($(this));
    let postData = {
        name: loginData.name,
        email: loginData.email,
        password: loginData.password,
    }

    DashboardClient.post(DashboardClient.domainUrl() + "/v1/register", postData)
        .then((response) => {
            if (response.status === true) {
                console.log(response.message);
                toastr.success(response.message, "success", DashboardHelper.toastOption());
                window.location.href = "login.php";
                DashboardHelper.setAccessToken(response.token);
            }
        })
        .catch((error) => {
            toastr.error(error.responseJSON.message, "error", DashboardHelper.toastOption());
        })
});