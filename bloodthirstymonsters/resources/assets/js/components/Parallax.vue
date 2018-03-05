<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Parallax</div>
                    <div class="panel-body">
                        <p> This section will output the parallax design.</p>
                        <h1 v-parallax="0.2">vue-parallax-js</h1>
                        <!--<img src="storage/app/public/pensiveclem.png" v-parallax="0.2">-->
                        <!--<img src="/storage/img/pensiveclem.png" v-parallax="0.2">-->
                        <!--<router-view></router-view>-->
                        <div id="parallax">
                            <img src="storage/img/sky.png" v-parallax="0.2" class="layer sky">
                            <img src="storage/img/hills.png" v-parallax="0.4" class="layer hills">
                            <img src="storage/img/tree.png" v-parallax="-0.2" class="layer tree">
                            <img src="storage/img/foreground.png" v-parallax="0" class="layer foreground">
                            <!--<div v-parallax="0.2" class="layer sky"></div>-->
                            <!--<div v-parallax="0.4" class="layer hills"></div>-->
                            <!--<div v-parallax="0.6" class="layer tree"></div>-->
                            <!--<div v-parallax="0.8" class="layer foreground"></div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
    #parallax {
        height: 600px;
        overflow: hidden;
        position: relative;

        .layer {
            /*background-position: bottom center;*/
            bottom: 0;
            left: 0;
            background-size: auto;
            background-repeat: no-repeat;
            width: 100%;
            height: 600px;
            position: absolute;
            /*z-index: -1;*/

            &.sky {
                /*background-image: url("storage/img/sky.png");*/
                z-index: 1;
            }
            &.hills {
                /*background-image: url("storage/img/hills.png");*/
                z-index: 2;
            }
            &.tree {
                /*background-image: url("storage/img/tree.png");*/
                z-index: 3;
            }
            &.foreground {
                /*background-image: url("storage/img/foreground.png");*/
                z-index: 4;
            }
        }
    }

</style>

<script>
    export default {
        mounted() {
            console.log('Component Parallax mounted.')
        }
    }
</script>