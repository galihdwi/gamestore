yii.confirm = function (message, ok, cancel) {
    Swal.fire({
        title: 'Confirmation',
        text: message,
        type: 'warning',
        reverseButtons: true,
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#b2b2b2',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            !ok || ok();
        } else {
            !cancel || cancel();
        }
    });
    // confirm will always return false on the first call
    // to cancel click handler
    return false;
}
