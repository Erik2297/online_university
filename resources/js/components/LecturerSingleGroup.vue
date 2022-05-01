<template>

    <div>
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <div id="content" class="container">
            <h3 class="pb-4"> Իմ Խումբը / {{ group.name }} </h3>
            <div class="row">

                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-4 col-sm-12" v-for="student in students" :key="student.id">
                            <div class="card product_item">
                                <div class="body">
                                    <div class="cp_img">
                                        <img :src="'/'+student.avatar" alt="Product" class="img-fluid mx-auto" width='225'>
                                        <div v-if="student.id != user.id" class="hover">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm waves-effect">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm waves-effect">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <img v-if="student.role_in_group == 'leader'" :src="'/images/lead3.png'" width="60" class="lead-badge" title="Խմբի ավագ" alt="Խմբի ավագ">
                                    </div>
                                    <div class="product_details">
                                        <h5>
                                            <a v-if="student.id == user.id" href="ec-product-detail.html"> Me </a>
                                            <a v-else href="ec-product-detail.html">{{ student.name }} {{ student.surname }}</a>
                                        </h5>
                                        <!-- <ul class="product_price list-unstyled">
                                            <li class="old_price">$16.00</li>
                                            <li class="new_price">$13.00</li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- content finished -->

    </div>

</template>

<script>

export default {
    data(){
        return{
            students: [],
            group: {},
            user: {},
        }
    },
    mounted(){
        const group_id = this.$route.params.id
        axios.get(`/api/groupmembers/${group_id}`).then( res =>  {
            this.students = res.data
        })
        axios.get(`/api/groupname/${group_id}`).then( res =>  {
            this.group = res.data[0]
        })
        console.log();
    }
}

</script>

<style scoped>
    @import '../../css/mygroup.css';
</style>
<style scoped>
    #content {
        padding-top: 120px !important;
    }
</style>
