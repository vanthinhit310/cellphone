<template>
    <div class="home-slide">
        <a-carousel arrows>
            <div
                slot="prevArrow"
                slot-scope="props"
                class="custom-slick-arrow"
                style="left: 10px; zindex: 1"
            >
                <a-icon type="left-circle" />
            </div>
            <div
                slot="nextArrow"
                slot-scope="props"
                class="custom-slick-arrow"
                style="right: 10px"
            >
                <a-icon type="right-circle" />
            </div>
            <div><h3>1</h3></div>
            <div><h3>2</h3></div>
            <div><h3>3</h3></div>
            <div><h3>4</h3></div>
        </a-carousel>
    </div>
</template>

<script>
export default {};
</script>

<style scoped></style>
