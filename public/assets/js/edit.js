function edit(){
    Swal.fire({
        title: 'Submit your new username',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Update',
        showLoaderOnConfirm: true,
        preConfirm: (name) => {
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = (evt.loaded / evt.total) * 100;
                            //Do something with upload progress here
                        }
                    }, false);
                    return xhr;
                },
                type: "POST",
                dataType: "json",
                url: "/userEdit",
                data: {'_token':$('meta[name="_token"]').attr('content'),
                    'userName': name,
                },
                beforeSend: function () {
                    Swal.fire({
                        title: "Please wait while update Name",
                        imageUrl: '../../assets/images/gif/loading.gif',
                        imageHeight: 150,
                        showCancelButton: false, // There won't be any cancel button
                        showConfirmButton: false, // There won't be any confirm button
                        allowOutsideClick: false,
                        footer: 'Name Updating'
                    });
                },
                success: function(data){
                    Swal.close();
                    setTimeout(function(){
                        window.location.reload(1);
                    }, 1000);
                },
                error: function(response) {
                    console.log(response);
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'SomeThing get Wrong',

                    });
                }
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
    })
}
