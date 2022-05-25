<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
            <a class="navbar-brand logo-image" href="/">
                <img :src="'/images/logo2.svg'" alt="alternative">
            </a>
            <li style="list-style:none" class="text-light logo-header"> Online University </li>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-links page-scroll" href="/">ԳԼԽԱՎՈՐ <span class="sr-only">(current)</span></a>
                    </li>
                    <li v-if="!logInOutIcons" class="nav-item">
                        <a v-if="!lecturer" class="nav-link nav-links page-scroll" href="/profile">ՊՐՈՖԻԼ</a>
                        <a v-else class="nav-link nav-links page-scroll" href="/lecturerprofile">ՊՐՈՖԻԼ</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link nav-links page-scroll" href="/forum">ՖՈՐՈՒՄ</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link nav-links page-scroll" target="blank" href="https://nuaca.am/%d5%a3%d5%ab%d5%bf%d5%b8%d6%82%d5%a9%d5%b5%d5%b8%d6%82%d5%b6/%d5%b6%d5%b8%d6%80%d5%b8%d6%82%d5%a9%d5%b5%d5%b8%d6%82%d5%b6%d5%b6%d5%a5%d6%80">ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
                    </li>
                    <li v-if="!logInOutIcons" class="nav-item">
                        <a class="nav-link nav-links page-scroll" href="/meeting">ՕՆԼԱՅՆ ՄԻԹԻՆԳ</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link nav-links dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">DROPDOWN</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">TERMS CONDITIONS</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">PRIVACY POLICY</span></a>
                        </div>
                    </li> -->

                </ul>
                <span v-if="logInOutIcons" class="nav-item social-icons text-light nav-links">
                        Մուտք
                    <span class="fa-stack">
                        <a data-toggle="modal" data-target="#loginModal" title="sign-in" class="login-modal-icon justify-content-center">
                            <span class="hexagon"></span>
                            <i class="fas fa-sign-in-alt fa-stack-1x"></i>
                        </a>
                    </span>
                        Գրանցում
                    <span class="fa-stack">
                        <a data-toggle="modal" data-target="#registerModal" title="sign-up" class="register-modal-icon">
                            <span class="hexagon"></span>
                            <i class="fas fa-user-plus fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
                <span v-else class="nav-item social-icons text-light nav-links">
                    <!-- Ելք -->
                    <span class="fa-stack">
                        <a @click="Logout()">
                            <span class="hexagon"></span>
                            <i class="fas fa-sign-out-alt fa-stack-1x" title="Ելք"></i>
                        </a>
                    </span>
                    <!-- Կարգավորումներ -->
                    <!-- <span class="fa-stack">
                        <a>
                            <span class="hexagon"></span>
                            <i class="fas fa-gear fa-stack-1x" title="Կարգավորումներ"></i>
                        </a>
                    </span> -->
                    <span class="fa-stack">
                        <span class="dropleft">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" type="button" role="button">
                                <span class="hexagon">
                                    <i class="fas fa-gear fa-stack-1x" title="Կարգավորումներ"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a v-if="!lecturer" class="dropdown-item" href="/profile">
                                    <i class='fa fa-user'></i>
                                    Պրոֆիլ
                                </a>
                                <a v-else class="dropdown-item" href="/lecturerprofile">
                                    <i class="fa fa-user"></i>
                                    Պրոֆիլ
                                </a>
                                <a class="dropdown-item" href="/profile/edit">
                                    <i class="fa fa-gear"></i>
                                    Կարգավորումներ
                                </a>
                                <a class="dropdown-item text-light" @click="Logout()">
                                    Ելք
                                    <i class="fas fa-sign-out-alt ml-4"></i>
                                </a>
                            </div>
                        </span>
                    </span>
                </span>

            </div>
        </nav>
        <Login />
        <Registration />

    </div>
</template>
<script>

import Login from "../components/authmodals/Login.vue";
import Registration from "../components/authmodals/Registration.vue";
export default {
    components:{
        Registration,
        Login,
    },
    data(){
        return{
            logInOutIcons: true,
            lecturer: false
        }
    },
    mounted(){
        setInterval(()=>{
            if (localStorage.getItem("user") != null) {
                this.logInOutIcons = false
                if (localStorage.getItem("user")) {
                    let user = JSON.parse(localStorage.getItem("user"))
                    if( 'science_degree' in user){
                        this.lecturer = true
                    }
                }
            }
        },500)
    },
    methods:{
        Logout(){
            axios.post('/api/logout').then( res => {
                if(res.data.hasOwnProperty('ok')){
                    delete localStorage.user
                    location.replace('/')
                }
            })
        }
    }
}

</script>

<style>

.modal-header .close {
    margin-top: -1.5rem;
}
.form-title {
    margin: -2rem 0rem 2rem;
}
.btn-round {
    border-radius: 3rem;
}
.delimiter {
    padding: 1rem;
}
.social-buttons .btn {
    margin: 0 0.5rem 1rem;
}
.signup-section {
    padding: 0.3rem 0rem;
}
.nav-links, .logo-header {
    text-shadow: 0 1px 3px #113448;
}
.fa-sign-in-alt::before , .fa-user-plus::before  {
    margin-left: -7px;
}
/* .fa-gear::before */

.fa-sign-out-alt::before{
    margin-left: -4px;
}


</style>
