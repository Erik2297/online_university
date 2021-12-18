<template>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close close-reg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pl-4 pr-4">
                    <div class="form-title text-center">
                        <h4>Գրանցում </h4>
                    </div>
                    <div class="d-flex flex-column text-center pl-4 pr-4">
                        <form>
                            <div class="form-group">
                                <label class="errors-texts" for="name">{{ regError.name }} <span style="color:#0000">.</span> </label>
                                <input v-model="regData.name" type="text" class="form-control" id="name" placeholder="Մուտքագրեք ձեր անունը">
                            </div>
                            <div class="form-group">
                                <label class="errors-texts" for="name">{{ regError.surname }} <span style="color:#0000">.</span> </label>
                                <input v-model="regData.surname" type="text" class="form-control" id="surname" placeholder="Մուտքագրեք ձեր ազգանունը">
                            </div>
                            <div class="form-group">
                                <label class="errors-texts" for="name">{{ regError.born }} <span style="color:#0000">.</span> </label>
                                <datepicker
                                    placeholder="Ծննդյան տվյալներ" v-model="regData.born"
                                    class="form-control datepicker-custom"
                                    :format="DatePickerFormat"
                                >
                                </datepicker>
                            </div>
                            <div class="form-group">
                                <label class="errors-texts" for="name">{{ regError.email }} <span style="color:#0000">.</span> </label>
                                <input v-model="regData.email" type="email" class="form-control" id="email" placeholder="Մուտքագրեք ձեր էլ․ հասցեն">
                            </div>
                            <div class="form-group">
                                <label class="errors-texts" for="gender">{{ regError.gender }} <span style="color:#0000">.</span> </label>
                                <select v-model="regData.gender" class="form-control" id="gender">
                                    <option value="" selected disabled > Ընտրեք ձեր սեռը </option>
                                    <option value="male"> Արական </option>
                                    <option value="female"> Իգական </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="errors-texts" for="group">{{ regError.group_id }} <span style="color:#0000">.</span> </label>
                                <div class="wrapper">
                                    <select v-model="regData.group_id" class="form-control group-select" id="group" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                        <option value="" selected disabled > Ընտրեք ձեր խումբը </option>
                                        <option v-for="item in groups" :key='item.id' :value="item.id">
                                            {{ item.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="errors-texts" for="name">{{ regError.password }} <span style="color:#0000">.</span> </label>
                                <input v-model="regData.password" type="password" class="form-control" id="password" placeholder="Մուտքագրեք ձեր գաղտնաբառը">
                            </div>
                            <div class="form-group">
                                <label class="errors-texts" for="name">{{ regError.cpassword }} <span style="color:#0000">.</span> </label>
                                <input v-model="regData.cpassword" type="password" class="form-control" id="cpassword" placeholder="Հաստատեք ձեր գաղտնաբառը">
                            </div>
                            <button type="button" class="btn btn-info btn-block btn-round mt-4" id="register-button" @click="Registration">Հաստատել</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment'
export default {
    name: 'Registration',
    components: {
        Datepicker
    },
    data(){
        return{
            regData:{
                name:'',
                surname:'',
                born: null,
                gender: '',
                group_id:'',
                email:'',
                password:'',
                cpassword:'',
            },
            regError:{
                name:'',
                surname:'',
                born:'',
                gender:'',
                group_id:'',
                email:'',
                password:'',
                cpassword:'',
            },
            groups:[],
            DatePickerFormat: 'dd.MM.yyyy',
            checkIfDataSelected: false,
        }
    },
    watch:{
        "regData.born"(val){
            this.checkIfDataSelected = true
        },
    },
    mounted(){
        axios
        .post('api/groups')
        .then( response => {
            this.groups = response.data.groups;
        });
    },
    methods:{
        Registration(){
            (!this.checkIfDataSelected) ? this.regData.born = '' : '' ;
            const data = JSON.stringify(this.regData)
            axios
            .post('api/registration/'+data)
            .then( response => {
                if(response.data.hasOwnProperty('errors')){
                    for( let item in this.regError ){
                        this.regError[item] = ''
                    }
                    for( let error in response.data.errors ){
                        this.regError[error] = response.data.errors[error][0]
                    }
                }
                else{
                    for( let item in this.regError ){
                        this.regError[item] = ''
                    }
                    document.querySelector('.close-reg').click()
                    // document.querySelector('.login-modal-icon').click()
                    Swal.fire({
                        icon: 'info',
                        title: 'Ստուգեք ձեր էլ․ հասցեն !',
                        text: 'Էլ․ նամակը ուղարկված է ակաունտը հաստատելու համար',
                    })
                }
            });
        },
    }
}
</script>

<style>
    a:hover{
        cursor: pointer;
    }
    .datepicker-custom input{
        width: 100%;
        height: 100%;
        outline: none;
        border: none;
    }
    .errors-texts{
        font-size: 12px;
        height: 0 !important;
        display: inline;
        color: #dc3545;
    }
    .modal-open #registerModal p{
        font: 400 1rem/1rem "Open Sans", sans-serif;
    }
    #registerModal .form-group{
        margin-bottom: 0 !important;
    }
    .wrapper{
        max-height: 150px;
    }
</style>