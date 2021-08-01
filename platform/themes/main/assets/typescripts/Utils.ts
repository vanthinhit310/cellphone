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
    initInnerZoom: function (id) {
        let image = $(`#${id}`);
        let zoomActive = false;

        zoomActive = !zoomActive;
        if (zoomActive) {

            if ($(image).length > 0) {
                console.log(id);
                console.log(image);

                $(image).elevateZoom({
                    cursor: 'crosshair',
                    zoomType: 'inner',
                });
            }
        } else {
            $.removeData(image, 'elevateZoom');//remove zoom instance from image
            $('.zoomContainer:last-child').remove();// remove zoom container from DOM
        }
    }
};

$(document).ready(function () {
    Utils.quantityCheck();
    Utils.quantityControl();
    Utils.initSemantic();
    Utils.initCountdown();
});
