<template>
    <div class="container" role="navigation">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!--<div class="panel-heading">Navbar</div>-->
                <ul class="Footer">
                    <router-link to="/">Home</router-link>
                    <router-link to="/monsters">Monsters</router-link>
                    <router-link to="/coming-soon">Coming Soon!</router-link>
                </ul>
            </div>
            <!--<router-view></router-view>-->
        </div>
    </div>
</template>

<style lang="scss">
    .Footer {
        height: 125px;
        background-color: darkslategrey;
        align-items: center;
        display: flex;
        justify-content: center;
        padding-left: 0px;
        a {
            padding: 0px 10px;
        }
    }
</style>

<script>

</script>