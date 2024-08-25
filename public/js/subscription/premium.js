$(document).ready(function () {
    $("#class").on("change", () => {
        const selectedClass = $("#class").val();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $(
            "#chapter_name, #chapter_description, #actual_price, #offer_price, #total_amount"
        ).empty();

        $.ajax({
            url: "/user/subscription/plan/class/price/" + selectedClass,
            type: "GET",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                if (response.status == "success") {
                    $("#class_name").append(response.result.name);
                    $("#class_description").append(response.result.description);
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
