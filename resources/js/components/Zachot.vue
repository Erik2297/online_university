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

                            <td v-if="item.mark >= 0 && item.mark <= 7" class="text-center text-danger" style="font-weight: bold"> {{ item.mark }} (անբավ) </td>
                            <td v-if="item.mark >= 8 && item.mark <= 13" class="text-center text-warning" style="font-weight: bold"> {{ item.mark }} (բավ) </td>
                            <td v-if="item.mark >= 14 && item.mark <= 17" class="text-center text-primary" style="font-weight: bold"> {{ item.mark }} (լավ) </td>
                            <td v-if="item.mark >= 18 && item.mark <= 20" class="text-center text-success" style="font-weight: bold"> {{ item.mark }} (գեր) </td>

                            <td v-if="data.indexOf(item) == 0" rowspan="3" class="text-center text-bold text-wrap" style="font-weight: bold; font-size: 30px;"> {{ key }} Կիսամյակ</td>
                        </tr>
                    </tbody>


                </table>
            </div>
        </div>
        <!-- content finished -->

    </div>

</template>

<script>

export default {
    data(){
        return{
            dataLoop: [],
        }
    },
    mounted(){
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.get(`/api/studentschedule`).then( res =>  {
            this.dataLoop = res.data
            console.log(this.dataLoop );
        })
    }
}

</script>

<style scoped>
    @import '../../css/zachot.css';
    td{
        font-weight: bold;
        font-size: 16px !important;
    }
</style>
