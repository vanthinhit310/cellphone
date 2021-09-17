<template>
    <header class="header-wrapper">
        <div class="container">
            <div class="top-header">
                <a-row type="flex" justify="space-between">
                    <a-col :span="12">
                        <a-space :size="5">
                            <a-button type="link" size="small">
                                <a-icon type="facebook" /> Facebook
                            </a-button>
                            <a-button type="link" size="small">
                                <a-icon type="instagram" /> Instagram
                            </a-button>
                        </a-space>
                    </a-col>
                    <a-col class="text-right" :span="12">
                        <a-space :size="5">
                            <a-button type="link" size="small">
                                <a-icon type="environment" /> Tìm cửa hàng
                            </a-button>
                        </a-space>
                    </a-col>
                </a-row>
            </div>
        </div>
    </header>
</template>

<script>
export default {
}
</script>

<style scoped>

</style>
