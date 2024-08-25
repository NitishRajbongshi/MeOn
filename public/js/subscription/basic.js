$(document).ready(function () {
    $("#class").on("change", () => {
        console.log("change");
        // Get CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $("#subject").empty();
        $("#subject").append('<option value="">Choose One</option>');

        const selectedClass = $("#class").val();
        $.ajax({
            url: "/user/subscription/plan/subject/list/" + selectedClass,
            type: "GET",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                if (response.status == "success") {
                    $.each(response.result, function (index, subject) {
                        $("#subject").append(
                            '<option value="' +
                                subject.id +
                                '">' +
                                subject.name +
                                "</option>"
                        );
                    });
                } else {
                    alert(`Failed! ${response.message}`);
                }
            },
            error: function (e) {
                console.error("AJAX error:", e);
                alert("Server Error!");
            },
        });
    });

    $("#subject").on("change", () => {
        const selectedSubject = $("#subject").val();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $("#chapter").empty();
        $("#chapter").append('<option value="">Choose One</option>');

        $.ajax({
            url: "/user/subscription/plan/chapter/list/" + selectedSubject,
            type: "GET",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                if (response.status == "success") {
                    $.each(response.result, function (index, subject) {
                        $("#chapter").append(
                            '<option value="' +
                                subject.id +
                                '">' +
                                subject.name +
                                "</option>"
                        );
                    });
                } else {
                    alert(`Failed! ${response.message}`);
                }
            },
            error: function (e) {
                console.error("AJAX error:", e);
                alert("Server Error!");
            },
        });
    });

    $("#chapter").on("change", () => {
        const selectedChapter = $("#chapter").val();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        
        $(
            "#chapter_name, #chapter_price, #actual_price, #offer_price, #total_amount"
        ).empty();

        $.ajax({
            url: "/user/subscription/plan/chapter/price/" + selectedChapter,
            type: "GET",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                if (response.status == "success") {
                    $("#chapter_name").append(response.result.name);
                    $("#chapter_price").append(response.result.actual_price);
                    $("#actual_price").append(response.result.actual_price);
                    $("#offer_price").append(response.result.offer_price);
                    $("#total_amount").append(response.result.offer_price);
                    
                    $("#actual_price_input").val(response.result.actual_price);
                    $("#offer_price_input").val(response.result.offer_price);
                } else {
                    alert(`Failed! ${response.message}`);
                }
            },
            error: function (e) {
                console.error("AJAX error:", e);
                alert("Server Error!");
            },
        });
    });
});
