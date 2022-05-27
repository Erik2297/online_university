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
            <div class="container">
                <!-- <form id="fileUploadForm" action="/" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input type="hidden" id="filename" name="filename" value="">
                                            <input type="file" id="uploadedFile" name="uploadedFile" class="form-control" accept="*">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-primary">Վերբեռնել</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form> -->
                <div class="card-body">
                    <div v-if="success != ''" class="alert alert-success" role="alert">
                        {{success}}
                    </div>
                    <form @submit="formSubmit" enctype="multipart/form-data">
                        <strong>Name:</strong>
                        <input type="text" class="form-control" v-model="name">
                        <strong>File:</strong>
                        <input type="file" class="form-control" v-on:change="onFileChange">

                        <button class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

export default {
    data(){
        return{
            name: '',
            file: '',
            success: ''
        }
    },
    methods: {
        onFileChange(e){
            console.log(e.target.files[0]);
            this.file = e.target.files[0];
        },
        formSubmit(e) {
            setTimeout(() => {
                Swal.fire({
                    icon: 'success',
                    text: 'Ֆայլը հաջողությամբ վերբեռնված է !',
                })
            }, 700)
            e.preventDefault();
            let currentObj = this;

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let formData = new FormData();
            formData.append('file', this.file);

            axios.post('/api/formSubmit', formData, config)
            .then(function (response) {
                currentObj.success = response.data.success;
            })
            .catch(function (error) {
                currentObj.output = error;
            });
        }
    }
}

</script>

<style scoped>
    #content {
        padding-top: 120px !important;
    }
</style>
