<template>

    <div>
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <div id="content" class="container text-center">
            <div style="margin-top: 200px">
                <h1> 404 </h1>
                <h3> ՍԽԱԼ ՀԱՍՑԵ </h3>
            </div>
            <div style="cursor:ponter" class="mt-4">
                <a href="/">
                    Վերադառնալ գլխավոր էջ
                    <i class="fas fa-undo text-info"></i>
                </a>
            </div>
        </div>

    </div>

</template>

<script>

export default {
    data(){
        return{

        }
    }
}

</script>

<style scoped>
    #content {
        padding-top: 120px !important;
    }
</style>
