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
            <h3> Համալսարանի Նորությունները </h3>
            <div class="row">

                <div class="blog-container">
                    <div class="blog-header">
                        <div class="blog-cover">
                            <div class="blog-author">
                                <h3> NAME OF POSTER </h3>
                            </div>
                        </div>
                    </div>
                    <div class="blog-body">
                        <div class="blog-title">
                            <h1><a href="#">TITLE OF NEWS SINGLE NEWS</a></h1>
                        </div>
                        <div class="blog-summary">
                            <p>I love working on fresh designs that <a href="https://www.youtube.com/watch?v=hANtM1vJvOo">breathe</a>. To that end, I need to freshen up my portfolio here because it does exactly the opposite. For the next month I will be working almost exclusively on my portfolio. Sounds like a lot of fun!</p>
                        </div>
                    </div>
                    <div class="blog-footer">
                        <ul>
                            <li class="published-date">2 days ago</li>
                            <li class="comments">
                                <i class="fa fa-comment icon-comment"></i>
                                <span class="numero">4</span>
                            </li>
                            <li class="shares">
                                <i class="fa fa-heart icon-like"></i>
                                <span class="numero">3</span>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="blog-container">
                    <div class="blog-header">
                        <div class="blog-author--no-cover">
                            <h3>Russ Beye</h3>
                        </div>
                    </div>
                    <div class="blog-body">
                        <div class="blog-title">
                            <h1><a href="#">This Post Has No Cover Image</a></h1>
                        </div>
                        <div class="blog-summary">
                            <p>Here is an example of a post without a cover image. You don't always have to have a cover image. In fact, leaving them out from time to time and disrupt the predictive flow and make the overall design more interesting. Something to think about.</p>
                        </div>
                    </div>
                    <div class="blog-footer">
                        <ul>
                            <li class="published-date">4 days ago</li>
                            <li class="comments">
                                <i class="fa fa-comment icon-comment"></i>
                                <span class="numero">16</span>
                            </li>
                            <li class="shares">
                                <i class="fa fa-heart icon-like"></i>
                                <span class="numero">30</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="blog-container">
                    <div class="blog-header">
                        <div class="blog-author--no-cover">
                            <h3>Russ Beye</h3>
                        </div>
                    </div>
                    <div class="blog-body">
                        <video class="video-body" controls poster="http://artbees.net/themes/jupiter-demo/wp-content/uploads/2013/10/home-vid-img.jpg" id="bgvid">
                            <source src="http://artbees.net/themes/jupiter-demo/wp-content/uploads/2013/10/homepage.webm" type="video/webm">
                            <source src="http://artbees.net/themes/jupiter-demo/wp-content/uploads/2013/10/shutterstock_v3702740_4.m4v" type="video/mp4">
                        </video>
                        <div class="blog-title">
                            <h1><a href="#">A Video Based Blog Post</a></h1>
                        </div>
                    </div>
                    <div class="blog-footer">
                        <ul>
                            <li class="published-date">4 days ago</li>
                            <li class="comments">
                                <i class="fa fa-comment icon-comment"></i>
                                <span class="numero">16</span>
                            </li>
                            <li class="shares">
                                <i class="fa fa-heart icon-like"></i>
                                <span class="numero">30</span>
                            </li>
                        </ul>
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

        }
    }
}

</script>

<style scoped>
    @import '../../css/news.css';
</style>
