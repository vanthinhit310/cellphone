// @ts-nocheck
const Utils = {
    quantityControl: function() {
        $(".plus").click(function() {
            let val = $(".number").val();
            val++;
            if (val >= 0) {
                $(".number").attr("value", val);
            }
        });
        $(".minus").click(function() {
            let val = $(".number").val();
            val--;
            if (val >= 0) {
                $(".number").attr("value", val);
            }
        });
    }
};

$(document).ready(function () {
    Utils.quantityControl();
});
