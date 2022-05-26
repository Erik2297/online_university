<template>
    <div class="container-xl px-4 mt-4" id="content">
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Անձնական տվյալներ</div>
                    <div class="card-body">
                        <form :v-model="form"  @submit="onSubmit(form)">
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Անուն</label>
                                    <input class="form-control" id="inputFirstName" type="text"  v-model="form.name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Ազգանուն</label>
                                    <input class="form-control" id="inputLastName" type="text" v-model="form.surname" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Էլ․ հասցե</label>
                                <input class="form-control" id="inputEmailAddress" type="email" v-model="form.email" required>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="password">Նոր գաղտնաբառ</label>
                                    <input class="form-control" id="password" type="text" v-model="form.newPassword" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="confirmPassword">Կրկնել գաղտնաբառը</label>
                                    <input class="form-control" id="confirmPassword" type="text" v-model="form.confirmPassword" required>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right" type="button" @click="onSubmit(form)">Պահպանել</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'EditProfile',
    data(){
        return{
            user: {},
            form: {
                name: null,
                surname: null,
                email: null,
                newPassword: null,
                confirmPassword: null
            }
        }
    },
    mounted(){
        this.user = JSON.parse(localStorage.getItem("user"))
        this.form = this.user
    },
    methods:{
        onSubmit(userData){
            if(userData.newPassword && userData.confirmPassword) {
                if(
                    userData.newPassword !== userData.confirmPassword ||
                    userData.newPassword.length < 8 && userData.confirmPassword < 8
                ) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooops',
                        text: 'Կան սխալներ, լրացրեք բոլոր դաշտերը !',
                    })
                }
            }
            else if(!userData.name || !userData.surname || !userData.email){
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops',
                    text: 'Կան սխալներ, լրացրեք բոլոր դաշտերը !',
                })
            }
            else{
                axios.post('/api/editUser', userData).then( (res) => {
                    this.form.name = res.data.name
                    this.form.surname = res.data.surname
                    this.form.email = res.data.email

                    this.user = res.data
                    delete localStorage.user
                    localStorage.user = JSON.stringify(res.data)
                    Swal.fire({
                        icon: 'info',
                        title: 'Շատ լավ',
                        text: 'Անձնական տվյալները հաջողությամբ փոխվել են !',
                    })
                    console.log(this.user , this.form, res.data);
                })
            }
        }
    }
}
</script>

<style scoped>
    @import '../../css/editProfile.css';
</style>
