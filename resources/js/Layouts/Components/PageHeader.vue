<template lang="">
    <section class="page-header">
        <div class="banner-wrapper"
            :style="{ 'background-image': 'linear-gradient( rgba(0, 44, 48, 0.52), rgba(18,18,231,0.52)), url('+ bgImageSRC +')' }"
            >
            <div class="titles flex flex-col divide-y space-y-2">
                <h1 class="title">{{ pageTitle }}</h1>
                <h3 v-if="pageSubTitle" class="subtitle">{{ pageSubTitle }}</h3>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props: {
        pageTitle: {
            type: String,
            required: true
        },
        pageSubTitle: {
            type: String,
            required: false
        },
        bgImageSRC: {
            type: String,
            default: '/images/banner-products.jpg',
            required: false
        },
    }
}
</script>
<style lang="">

</style>
