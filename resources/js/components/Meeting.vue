<template>

    <div>
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <div id="content" class="container-fluid">
            <div class="row" style="height: 80vh">
                <iframe style="width:100%" src="https://online.whereby.com/demo-7ac1110f-29be-45e8-a9c3-88cbb7c5942d" allow="camera; microphone; fullscreen; speaker; display-capture"></iframe>
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
