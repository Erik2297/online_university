<template>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-title text-center">
                        <h4>Լրացրեք տվյալները մուտք գործելու համար</h4>
                    </div>
                    <div class="d-flex flex-column text-center pb-4 pr-4 pl-4">
                        <div class="d-flex justify-content-start aligh-items-center">
                            <input type="checkbox" id="dasaxos" class="mt-1" v-model="regData.lecturer">
                            <label for="dasaxos" style="user-select:none !important"> Մուտք գործել որպես դասախոս </label>
                        </div>
                        <form>
                            <div class="form-group">
                                <label class="errors-texts" for="email">{{ regError.email }} <span style="color:#0000">.</span> </label>
                                <input type="email" class="form-control" id="emailLogin" placeholder="Մուտքագրեք ձեր էլ․ հասցեն" v-model="regData.email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="passwordLogin" placeholder="Մուտքագրեք ձեր գաղտնաբառը" v-model="regData.password">
                            </div>
                            <button type="button" class="btn btn-info btn-block btn-round" @click="Login">Մուտք</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Login',
    data(){
        return{
            regData:{
                email:'',
                password:'',
                lecturer: false
            },
            regError:{
                email:'',
                password:'',
            },
            user: {}
        }
    },
    methods:{
        Login(){
            const data = JSON.stringify(this.regData)
            axios
            .post('api/login/'+data)
            .then( response => {
                if(response.data.hasOwnProperty('errors')){
                    this.regError.email = response.data.errors
                }
                else{
                    for( let item in this.regError ){
                        this.regError[item] = ''
                    }
                    document.querySelector('.close-reg').click()
                    axios.get('api/userget').then( res =>  {
                        this.user = res.data
                        localStorage.user = JSON.stringify(res.data)
                        console.log('science_degree' in this.user , this.user)
                        if( 'science_degree' in this.user)
                            this.$router.push('/lecturerprofile')
                        else
                            this.$router.push('/profile')
                    })
                }
            });
        },
    },
    watch: {
        'regData.lecturer'(val){
            console.log(val);
        }
    }
}
</script>

<style>
    a:hover{
        cursor: pointer;
    }
    .errors-texts{
        font-size: 12px;
        height: 0 !important;
        display: inline;
        color: #dc3545;
    }
</style>
