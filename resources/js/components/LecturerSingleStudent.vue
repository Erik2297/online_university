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
            <h1> Ուսանող </h1>
            <section id="content" class="container">
                <div class="page-heading">
                    <div class="media clearfix align-items-center">
                        <div class="media-left pr30 user-image-section">
                            <a href="#">
                                <img class="media-object mw150" :src="'/'+user.avatar" alt="..." style="width:200px;">
                            </a>
                            <img v-if="user.role_in_group == 'leader'" :src="'/images/lead3.png'" width="60" class="lead-badge" title="Խմբի ավագ" alt="Խմբի ավագ">
                        </div>
                        <div class="media-body va-m pl-2">
                            <h2 class="media-heading">
                                {{ user.name }}
                            </h2>
                            <p class="lead">
                                {{ user.surname }}
                            </p>
                            <div class="media-links w-25">
                                <ul class="list-inline list-unstyled d-flex justify-content-start">
                                    <li class="ml-2 mr-2">
                                        <a href="#" title="facebook-link">
                                            <i class="fab fa-facebook-square fs35 text-primary"></i>
                                        </a>
                                    </li>
                                    <li class="ml-2 mr-2">
                                        <a href="#" title="twitter-link">
                                            <i class="fab fa-twitter-square fs35 text-info"></i>
                                        </a>
                                    </li>
                                    <li class="ml-2 mr-2">
                                        <a href="#" title="gmail-link link">
                                            <img :src="'/images/gmail.png'" width="38" height="35.56" style="margin-top: -1px" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr>

            <h3> Ստուգարքային գրքույկ </h3>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Առարկա</th>
                            <th scope="col" class="text-center">Կրեդիտ</th>
                            <th scope="col" class="text-center">Միավոր</th>
                            <th scope="col" class="text-center">Կիսամյակ</th>
                        </tr>
                    </thead>

                    <tbody v-for=" (data , key) in dataLoop" :key="data.id">
                        <hr>
                        <tr v-for="item in data" :key="item.id">

                            <td class="text-center"> {{ item.subject.name }} </td>
                            <td class="text-center text-info"> {{ item.subject.credits }} </td>

                            <td v-if="availableForEdit.includes(item.subject_id)" class="text-center text-danger" style="font-weight: bold">
                                <input type="text" class="from-control">
                            </td>
                            <td v-else-if="item.mark >= 0 && item.mark <= 7" class="text-center text-danger" style="font-weight: bold"> {{ item.mark }} (անբավ) </td>
                            <td v-else-if="item.mark >= 8 && item.mark <= 13" class="text-center text-warning" style="font-weight: bold"> {{ item.mark }} (բավ) </td>
                            <td v-else-if="item.mark >= 14 && item.mark <= 17" class="text-center text-primary" style="font-weight: bold"> {{ item.mark }} (լավ) </td>
                            <td v-else-if="item.mark >= 18 && item.mark <= 20" class="text-center text-success" style="font-weight: bold"> {{ item.mark }} (գեր) </td>

                            <td v-if="data.indexOf(item) == 0" rowspan="3" class="text-center text-bold text-wrap" style="font-weight: bold; font-size: 30px;"> {{ key }} Կիսամյակ</td>
                        </tr>
                    </tbody>


                </table>
            </div>

        </div>
    </div>

</template>

<script>

export default {
    data(){
        return{
            user: [],
            dataLoop: [],
            available: [],
            availableForEdit: [],
            inputs: [],
        }
    },
    mounted(){
        const id = this.$route.params.studentid
        axios.get(`/api/studentget/${id}`).then( res =>  {
            this.user = res.data.student[0]
            this.dataLoop = res.data.data
            this.available = res.data.available
            console.log(this.available);
            this.available.map( item => {
                this.availableForEdit.push(item.subject_id)
            })
            console.log(this.availableForEdit);
        })

    }
}

</script>

<style scoped>
    #content {
        padding-top: 120px !important;
    }
</style>
