<template>
    <div class="container" role="navigation">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!--<div class="panel-heading">Navbar</div>-->
                <ul class="nav navBar">
                    <router-link to="/">Home</router-link>
                    <router-link to="/monsters">Monsters</router-link>
                    <router-link to="/coming-soon">Coming Soon!</router-link>
                </ul>
            </div>
            <!--<router-view></router-view>-->
        </div>
    </div>
</template>

<style rel="stylesheet/scss" lang="scss" type="text/scss" scoped>
    /*.container {*/
        /*display: inline-flex;*/
        /*min-height: 200px;*/
    /*}*/
    .navBar {
        margin-bottom: 70px;
        margin-top: 30px;
        clear: both;
        display: block;
        a, a:hover, a:focus, a:active {
             text-decoration: none;
            padding: 0px 10px;
            &.router-link-exact-active {
                font-weight: bold;
                /*text-decoration: none;*/
            }
        }
    }
</style>

<script>
    export default {
        mounted() {
            console.log('Component Navbar mounted.')
        }
    }
</script>