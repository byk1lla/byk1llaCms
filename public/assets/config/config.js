function request(requestLink,method = "POST"){
    const formdata = new FormData();
    formdata.append("submit",1);

    return $.ajax({
        type: method,
        url: requestLink,
        data: formdata,
        processData: false,
        contentType: false
    });
}
function sendForm(form, requestLink) {
    const formData = new FormData(form);

    formData.append('OS', navigator.platform);
    formData.append('browser', encodeURIComponent(navigator.appCodeName));
    formData.append('browserVersion', encodeURIComponent(navigator.appVersion));

    const filteredFormData = new FormData();
    formData.forEach((value, key) => {
        if (value.trim()) {
            filteredFormData.append(key, value);
        }
    });


    return $.ajax({
        type: "POST",
        url: requestLink,
        data: filteredFormData,
        processData: false,
        contentType: false
    });
}