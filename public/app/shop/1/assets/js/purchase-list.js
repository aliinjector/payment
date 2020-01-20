
    function print_invoice() {
        window.print();
    }
    $(document).ready(function() {
        $(".showAddresses").click(function() {
            $(".address_1").removeClass("d-none");
            $(".address_2").removeClass("d-none");
            $(".address_3").removeClass("d-none");
            $(".newAddress").removeClass("d-none");
            $(".showAddresses").addClass("d-none");
            $(".address_input").addClass("d-none");
        });
    });
    $(document).ready(function() {
        $(".newAddress").click(function() {
            $(".address_input").removeClass("d-none");
            $(".newAddress").addClass("d-none");
            $(".address_1").addClass("d-none");
            $(".address_2").addClass("d-none");
            $(".address_3").addClass("d-none");
            $(".showAddresses").removeClass("d-none");

        });
    });
