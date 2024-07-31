$(".activeStudent").on("click", function () {
    if (confirm("Are you sure!")) {
        var dataId = $(this).data("id");

        if (dataId) {
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: "/admin/student/active",
                method: "POST",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                data: {
                    studentid: dataId,
                },
                success: function (response) {
                    if (
                        response.status == "success" &&
                        response.result != null
                    ) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "Continue",
                            customClass: {
                                confirmButton: "custom-success-button",
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Failed!",
                            text: response.message,
                            icon: "error",
                            confirmButtonText: "Continue",
                            customClass: {
                                confirmButton: "custom-failure-button",
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                },
                error: function (e) {
                    console.error("AJAX error:", e);
                },
            });
        } else {
            alert(
                "Failed to activate the particular student. Some error occured!"
            );
        }
    }
});
