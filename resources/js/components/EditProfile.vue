<template>
    <div class="container-xl px-4 mt-4">
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form :v-model="form"  @submit="onSubmit(form)">
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" v-model="form.name">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" v-model="form.surname">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" v-model="form.email">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="password">new password</label>
                                    <input class="form-control" id="password" type="password" placeholder="Enter your new password" v-model="form.newPassword">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="confirmPassword">confirm password</label>
                                    <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm your password" v-model="form.confirmPassword">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="button" @click="onSubmit(form)">Save changes</button>
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
                    return alert('error')
                }
            }
            if(!userData.name || !userData.surname || !userData.email){
                return alert('error')
            }
            axios.post('/api/editUser', userData).then( (res) => {
                this.form = res.data
                this.user = this.form
                delete localStorage.user
                localStorage.user = JSON.stringify(res.data)
                alert('success')
            })
        }
    }
}
</script>

<style scoped>
    @import '../../css/editProfile.css';
</style>
