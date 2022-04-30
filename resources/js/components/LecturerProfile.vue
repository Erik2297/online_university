<template>
    <div>
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <section id="content" class="container">
    <!-- Begin .page-heading -->
            <div class="page-heading">
                <div class="media clearfix align-items-center">
                <div class="media-left pr30 user-image-section">
                    <a href="#">
                        <img class="media-object mw150" :src="'http://127.0.0.1:8000/'+user.avatar" alt="..." style="width:200px;">
                    </a>
                    <img v-if="user.role_in_group == 'leader'" :src="'/images/lead3.png'" width="60" class="lead-badge" title="Խմբի ավագ" alt="Խմբի ավագ">
                </div>
                <div class="media-body va-m pl-2">
                    <h2 class="media-heading">
                        {{ user.name }} LECTURER
                    </h2>
                    <p class="lead">
                        {{ user.surname }}
                    </p>
                    <div class="media-links w-25">
                        <ul class="list-inline list-unstyled d-flex justify-content-start">
                            <li class="ml-2 mr-2">
                                <a href="#" title="facebook-link">
                                    <span class="fa fa-facebook-square fs35 text-primary"></span>
                                </a>
                            </li>
                            <li class="ml-2 mr-2">
                                <a href="#" title="twitter-link">
                                    <span class="fa fa-twitter-square fs35 text-info"></span>
                                </a>
                            </li>
                            <li class="ml-2 mr-2">
                                <a href="#" title="gmail-link link">
                                    <img :src="'images/gmail.png'" width="36" height="32" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                <div class="panel">
                    <div class="panel-body pn">
                    <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                        <thead>
                        <!-- <tr class="hidden">
                            <th class="mw30">#</th>
                            <th>First Name</th>
                        </tr> -->
                        </thead>
                        <tbody>
                        <tr>
                            <td style="cursor:ponter">
                                <i class="fa fa-calendar text-danger"></i>
                            </td>
                            <td style="cursor:ponter">
                                <a class="text-dark" style="text-decoration: none;" href="/dasacucak">Դասացուցակ</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="cursor:ponter">
                                <i class="fas fa-users text-primary"></i>
                            </td>
                            <td style="cursor:ponter">
                                <a class="text-dark" style="text-decoration: none;" href="/mygroup">Իմ Խումբը</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="cursor:ponter">
                                <i class="fas fa-book-open text-success"></i>
                            </td>
                            <td style="cursor:ponter">
                                <a class="text-dark" style="text-decoration: none;" href="/zachot">Ստուգարքային գրքույկ</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="cursor:ponter">
                                <i class="fas fa-file text-warning"></i>
                            </td>
                            <td style="cursor:ponter">Իմ Ֆայլերը</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                    <span class="panel-icon">
                        <i class="fa fa-trophy"></i>
                    </span>
                    <span class="panel-title"> My Skills</span>
                    </div>
                    <div class="panel-body pb5">
                    <span class="label label-warning mr5 mb10 ib lh15">Default</span>
                    <span class="label label-primary mr5 mb10 ib lh15">Primary</span>
                    <span class="label label-info mr5 mb10 ib lh15">Success</span>
                    <span class="label label-success mr5 mb10 ib lh15">Info</span>
                    <span class="label label-alert mr5 mb10 ib lh15">Warning</span>
                    <span class="label label-system mr5 mb10 ib lh15">Danger</span>
                    <span class="label label-info mr5 mb10 ib lh15">Success</span>
                    <span class="label label-success mr5 mb10 ib lh15">Ui Design</span>
                    <span class="label label-primary mr5 mb10 ib lh15">Primary</span>

                    </div>
                </div>
                </div>
                <div class="col-md-8">

                <div class="tab-block">
                    <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">Activity</a>
                    </li>
                    <li>
                        <a href="#tab1" data-toggle="tab">Social</a>
                    </li>
                    <li>
                        <a href="#tab1" data-toggle="tab">Media</a>
                    </li>
                    </ul>
                    <div class="tab-content p30" >
                    <div id="tab1" class="tab-pane active">
                        <div class="media">
                        <a class="pull-left" href="#"> <img class="media-object mn thumbnail mw50" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="..."> </a>
                        <div class="media-body">
                            <h5 class="media-heading mb20">Simon Rivers Posted
                            <small> - 3 hours ago</small>
                            </h5>
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="mw140 mr25 mb20">
                            <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="mw140 mr25 mb20">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mw140 mb20">
                            <div class="media-links">
                            <span class="text-light fs12 mr10">
                                <span class="fa fa-thumbs-o-up text-primary mr5"></span> Like </span>
                            <span class="text-light fs12 mr10">
                                <span class="fa fa-share text-primary mr5"></span> Share </span>
                            <span class="text-light fs12 mr10">
                                <span class="fa fa-floppy-o text-primary mr5"></span> Save </span>
                            <span class="text-light fs12 mr10">
                                <span class="fa fa-comment text-primary mr5"></span> Comment </span>
                            </div>
                        </div>
                        </div>
                        <div class="media mt25">
                        <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..."> </a>
                        <div class="media-body mb5">
                            <h5 class="media-heading mbn">Simon Rivers Posted
                            <small> - 3 hours ago</small>
                            </h5>
                            <p> Omg so freaking sweet dude.</p>
                            <div class="media pb10">
                            <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="..."> </a>
                            <div class="media-body mb5">
                                <h5 class="media-heading mbn">Jessica Wong
                                <small> - 3 hours ago</small>
                                </h5>
                                <p>Omgosh I'm in love</p>
                            </div>
                            </div>
                            <div class="media mtn">
                            <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="..."> </a>
                            <div class="media-body mb5">
                                <h5 class="media-heading mbn">Jessica Wong
                                <small> - 3 hours ago</small>
                                </h5>
                                <p>Omgosh I'm in love</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="media mt25">
                        <a class="pull-left" href="#"> <img class="media-object thumbnail mw50" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="..."> </a>
                        <div class="media-body">
                            <h5 class="media-heading mb20">Simon Rivers Posted
                            <small> - 3 hours ago</small>
                            </h5>
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="mw140 mr25 mb20">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mw140 mr25 mb20">
                            <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="mw140 mb20">
                            <div class="media-links">
                            <span class="text-light fs12 mr10">
                                <span class="fa fa-thumbs-o-up text-primary mr5"></span> Like </span>
                            <span class="text-light fs12 mr10">
                                <span class="fa fa-share text-primary mr5"></span> Share </span>
                            <span class="text-light fs12 mr10">
                                <span class="fa fa-floppy-o text-primary mr5"></span> Save </span>
                            <span class="text-light fs12 mr10">
                                <span class="fa fa-comment text-primary mr5"></span> Comment </span>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane"></div>
                    <div id="tab3" class="tab-pane"></div>
                    <div id="tab4" class="tab-pane"></div>
                    </div>
                </div>
                </div>
            </div>
        </section>

    </div>

</template>

<script>
export default {
    data(){
        return{
            user: {},
        }
    },
    mounted(){
        setTimeout(function() {
            $('.spinner-wrapper').fadeOut(500)
        }, 500);
        $('#loginModal').modal('hide')

        axios.get('api/userget').then( res =>  {
            this.user = res.data
            localStorage.user = JSON.stringify(res.data)
        })
    },
    methods:{

    }
}
</script>

<style scoped>
    @import '../../css/lecturerprofile.css';
</style>
