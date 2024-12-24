$(document).ready(function () {

    $('.model-table').on("click", ".delete-confirm", function () {
        let model = $(this).data("model");
        let id = $(this).data("id");
        let name = $(this).data("name");

        Swal.fire({
            title: "Are you sure?",
            text:
                "You won't be able to revert this " +
                model +
                " " +
                name +
                "!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            confirmButtonClass: "btn btn-primary",
            cancelButtonClass: "btn btn-danger ml-1",
            buttonsStyling: false,
        }).then(function (t) {
            if (t.isConfirmed) {
                $.ajax({
                    url: "http://localhost/dacs2/delete-" + model + "/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if (data["success"]) {
                            $("tr")
                                .find('[data-id="' + id + '"]')
                                .closest("tr")
                                .remove();
                            Swal.fire({
                                icon: "success",
                                title: "Deleted!",
                                text:
                                    "Your " +
                                    model +
                                    " " +
                                    name +
                                    " has been deleted.",
                                confirmButtonClass: "btn btn-success",
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: data["error"],
                                icon: "error",
                                confirmButtonClass: "btn btn-danger",
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong. Please try again.",
                            icon: "error",
                            confirmButtonClass: "btn btn-danger",
                        });
                    },
                });
            } else if (t.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Cancelled",
                    text: "Your " + model + " " + name + " is safe",
                    icon: "info",
                    confirmButtonClass: "btn btn-success",
                });
            }
        });
    }),
        // Add model
        $("#add-confirm").submit(function (event) {
            event.preventDefault();
            let model = $(this).data("model");

            let formData = new FormData(this);

            $.ajax({
                url: "http://localhost/dacs2/add-" + model,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Added!",
                            text: "Your " + model + " has been added.",
                            confirmButtonClass: "btn btn-success",
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: data.error,
                            icon: "error",
                            confirmButtonClass: "btn btn-danger",
                        });
                    }
                    console.log(data.rq);
                },
                error: function () {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong. Please try again.",
                        icon: "error",
                        confirmButtonClass: "btn btn-danger",
                    });
                },
            });
            return false;
        }),
        //Edit model
        $("#edit-confirm").submit(function (e) {
            e.preventDefault();
            let model = $(this).data("model");
            let name = $(this).data("name");
            let id = $(this).data("id");
            let formData = new FormData(this);

            Swal.fire({
                title: "Confirm Branch Edit?",
                text:
                    "Are you sure you want to edit this " +
                    model +
                    " " +
                    name +
                    "?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, edit it!",
                confirmButtonClass: "btn btn-primary",
                cancelButtonClass: "btn btn-danger ml-1",
                buttonsStyling: !1,
            }).then(function (t) {
                if (t.isConfirmed) {
                    $.ajax({
                        url: "http://localhost/dacs2/edit-" + model + "/" + id,
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            if (data.success) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Edited!",
                                    text:
                                        "Your " +
                                        model +
                                        " " +
                                        name +
                                        " has been edited.",
                                    confirmButtonClass: "btn btn-success",
                                });
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: data.error,
                                    icon: "error",
                                    confirmButtonClass: "btn btn-danger",
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                title: "Error!",
                                text: "Something went wrong. Please try again.",
                                icon: "error",
                                confirmButtonClass: "btn btn-danger",
                            });
                        },
                    });
                } else if (t.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Cancelled",
                        text: "Your " + model + " " + name + " file is safe",
                        type: "error",
                        confirmButtonClass: "btn btn-success",
                    });
                }
            });
            return false;
        })
});
