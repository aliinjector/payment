$(document).ready(function() {
    $(".showAddresses").click(function() {
        $(".address").removeClass("d-none");
        $(".newAddress").removeClass("d-none");
        $(".showAddresses").addClass("d-none");
        $(".address_input").addClass("d-none");
    });
});
$(document).ready(function() {
    $(".newAddress").click(function() {
        $(".address_input").removeClass("d-none");
        $(".newAddress").addClass("d-none");
        $(".address").addClass("d-none");
        $(".showAddresses").removeClass("d-none");

    });
});
