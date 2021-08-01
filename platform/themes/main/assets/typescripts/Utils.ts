// @ts-nocheck
const Utils = {
    quantityControl: function () {
        $(document).on("click", ".plus", function () {
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

        $(document).on("click", ".minus", function () {
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
    quantityCheck: function () {
        if ($(".numberQuantity").length) {
            $(document).on("input", ".numberQuantity", function () {
                let val = $(".numberQuantity").val();
                if (val == 0) {
                    $(".numberQuantity").val(1);
                } else if (val > 0) {
                    $(".numberQuantity").val(val);
                }
            });
        }
    },
    initSemantic: function () {
        $(".ui.dropdown").dropdown();
    },
    initCountdown: function () {
        $('[data-countdown]').each(function () {
            const $this = $(this), finalDate = $(this).data('countdown');
            const nextYear = moment.tz(`${finalDate}`, "Asia/Ho_Chi_Minh");

            $this.countdown(nextYear.toDate(), function (event) {
                $this.html(event.strftime(`
                    <ul class="countdown">
                        <li class="countdown__item">
                            <span class="font14">Kết thúc sau</span>
                        </li>
                        <li class="countdown__item">
                            <span class="countdown__item--span">%D</span>
                            :
                        </li>
                        <li class="countdown__item">
                            <span class="countdown__item--span">%H</span>
                            :
                        </li>
                        <li class="countdown__item">
                            <span class="countdown__item--span">%M</span>
                            :
                        </li>
                        <li class="countdown__item">
                            <span class="countdown__item--span">%S</span>
                        </li>
                    </ul>
                `));
            });
        });
    },
};

$(document).ready(function () {
    Utils.quantityCheck();
    Utils.quantityControl();
    Utils.initSemantic();
    Utils.initCountdown();
});
