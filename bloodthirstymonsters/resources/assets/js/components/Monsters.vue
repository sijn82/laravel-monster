<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <button class="newMonster-btn btn" @click="addMonster"> Add New Monster</button>
                    <div class="panel-heading">Monsters</div>
                    <div class="panel-body">
                        <p> This section will output the data from monsters.</p>
                        <!--<img src="storage/img/pensiveclem.png">-->
                        <!--<img src="storage/img/bananaen.png">-->
                        <!--<router-view></router-view>-->
                        <div>
                            <div>
                                <img src="storage/img/pensiveclem.png">
                                <img src="api/monsters/img/pensiveclem.png?w=600&h=480&filt=greyscale">

                            </div>
                            <ul v-for="monster in monsters" class="monsterIndex">
                                <li class="name">{{ monster.name }}</li>
                                <li class="description">{{ monster.description }}</li>
                                <li class="aggression_level">{{ monster.aggression_level }}</li>
                                <li class="monster_image"><img :src="'storage/img/' + monster.monster_image_name"> </li>
                                <!--<button @click="deleteMonster">Delete</button>-->
                                <!--<li class="monster_image">@{{ monster.monster_image }}</li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    /*#mostWanted {*/
        /*display: block;*/
        /*position: relative;*/
    /*}*/

    .newMonster-btn {
        margin-bottom: 30px;
        margin-top: 20px;
    }

    .monsterIndex li {
        list-style: none;
    }
</style>

<script>

    import NewMonster from '../components/NewMonster.vue';
//    import axios from 'axios';


    export default {

//        watch: {
//            '$route' (to, from) {
//                // Anything put in here will be acted upon each time a route is navigated to or from.
//            }
//        },
        data () {
            return {
                monsters: {},
                hasntRun: true,
                data: {},
                response: {
                    data: []
                }
            }
        },

        methods: {
            addMonster(){
                this.$router.push('/monsters/new')
            },
            deleteMonster() {

            }
//            reverse(value) {
//                return value.reverse();
//            }

        },
        computed: {
//            reverse: function (value) {
//                return value.reverse();
//            }
        },
        filters: {
//            reverse: function (value) {
//                return value.reverse();
//            }
        },
        created() {
            let self = this;
            axios.get('/api/monsters').then( response => {
//                console.log(response);
                self.monsters = response.data;
                console.log(self.monsters)
            }).catch(error => console.log(error));
        },

        mounted() {
            console.log('Component Monsters mounted.')
//            axios.get('/monsters').then( response => this.monsters = response.data );
//            console.log(this.monsters);
//            console.log(response);
        }
    }
</script>