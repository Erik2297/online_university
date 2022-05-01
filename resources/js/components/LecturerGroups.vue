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
            <h3> Իմ Խմբերը ` </h3>

            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-box clearfix">
                                <div class="table-responsive">
                                    <table class="table user-list">
                                        <thead>
                                            <tr>
                                                <th><span>Խմբի Անուն</span></th>
                                                <th><span>Խմբի Ավագ</span></th>
                                                <th><span>Ֆակուլտետ</span></th>
                                                <th><span>Ուսանողների քանակ</span></th>
                                                <th><span>Կուրս</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr v-for="group in groups" :key="group.id">
                                                <td>
                                                    <a :href="'/group/'+group.id" class="user-link"> Խումբ {{ group.name }} </a>
                                                </td>
                                                <td>
                                                    <img :src="group.leader_avatar" alt="">
                                                    <a href="#" class="user-link"> {{ group.leader }} </a>
                                                    <span class="user-subhead"> Ավագ </span>
                                                </td>
                                                <td class="text-center">
                                                    {{ group.faculty }}
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-default">
                                                        {{ group.count }} ուսանող
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    {{ group.course }} Կուրս
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</template>

<script>

export default {
    data(){
        return{
            groups: [
                {
                    id: 1,
                    name: 'Կ-82',
                    faculty: 'Կառավարման և Տեխնոլոգիայի',
                    leader: 'Անուն 1 Ազգանուն 1',
                    leader_avatar: '/images/default_avatars/w2.png',
                    count: '8',
                    course: '4'
                },
                {
                    id: 2,
                    name: 'Կ-83',
                    faculty: 'Կառավարման և Տեխնոլոգիայի',
                    leader: 'Անուն 9 Ազգանուն 9',
                    leader_avatar: '/images/default_avatars/w4.png',
                    count: '16',
                    course: '4'
                },
            ],
            user: {},
        }
    },
    mounted(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.get(`/api/lecturergroupget/${this.user.id}`).then( res =>  {
            this.groups[0].leader = res.data[0].name + ' ' + res.data[0].surname
            this.groups[1].leader = res.data[1].name + ' ' + res.data[1].surname

            this.groups[0].leader_avatar = res.data[0].avatar
            this.groups[1].leader_avatar = res.data[1].avatar
        })

    }
}

</script>


<style scoped>
    @import '../../css/lecturergroups.css';
</style>
<style scoped>
    #content {
        padding-top: 120px !important;
    }
</style>
