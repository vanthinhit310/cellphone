// @ts-nocheck
const Utils = {
    quantityControl: function() {
        $(document).on("click", ".plus", function() {
            let val = $(".numberQuantity").val();
            val++;
            if (val > 0) {
                $(".numberQuantity").val(val);
                return;
            } else {
                $(".numberQuantity").val(1);
                return;
            }
        });

        $(document).on("click", ".minus", function() {
            let val = $(".numberQuantity").val();
            val--;
            if (val > 0) {
                $(".numberQuantity").val(val);
                return;
            } else {
                $(".numberQuantity").val(1);
                return;
            }
        });
    },
    quantityCheck: function() {
        if ($(".numberQuantity").length) {
            $(document).on("input", ".numberQuantity", function() {
                let val = $(".numberQuantity").val();
                if (val == 0) {
                    $(".numberQuantity").val(1);
                } else if (val > 0) {
                    $(".numberQuantity").val(val);
                }
            });
        }
    },
    initSemantic: function() {
        $(".ui.dropdown").dropdown();
    }
};

$(document).ready(function() {
    Utils.quantityCheck();
    Utils.quantityControl();
    Utils.initSemantic();
});
