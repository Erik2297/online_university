<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
            <a class="navbar-brand logo-image" href="/">
                <img src="images/logo2.svg" alt="alternative">
            </a>
            <li style="list-style:none" class="text-light logo-header"> Online University </li>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">ԳԼԽԱՎՈՐ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#intro">ՆԱԽԱԲԱՆ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#services">ՖՈՐՈՒՄ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#callMe">ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#projects">PROJECTS</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">DROPDOWN</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">TERMS CONDITIONS</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">PRIVACY POLICY</span></a>
                        </div>
                    </li>

                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a data-toggle="modal" data-target="#loginModal" title="sign-in" class="login-modal-icon">
                            <span class="hexagon"></span>
                            <i class="fas fa-sign-in-alt fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a data-toggle="modal" data-target="#registerModal" title="sign-up" class="register-modal-icon">
                            <span class="hexagon"></span>
                            <i class="fas fa-user-plus fa-stack-1x"></i>
                        </a>
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

</style>
