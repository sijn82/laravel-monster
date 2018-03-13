<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <button class="newMonster-btn btn" @click="addMonster"> Add New Monster</button>
                    <div class="panel-heading">Monsters</div>
                    <div class="panel-body">
                        <p> This section will output the data from monsters.</p>
                        <!--<router-view></router-view>-->
                        <div>
                            <!-- this is the laravel-glide experimentation, to be revisited after finishing basic CRUD functionality -->
                            <!--<div>-->
                                <!--<img src="storage/img/pensiveclem.png">-->
                                <!--<img src="api/monsters/img/pensiveclem.png?w=600&h=480&filt=greyscale">-->
                            <!--</div>-->
                            <ul v-for="monster in monsters" class="monsterIndex">
                                    <li class="name">{{ monster.name }}</li>

                                <!--<li class="id">{{ monster.id }}</li>-->
                                <!--<li class="monster_image"><img :src="'storage/img/' + monster.monster_image_name + '?w=600&h=480&filt=greyscale'"> </li>-->
                                <li class="monster_image"><img :src="base64encoded"></li>
                                <!--<li class="monster_image"> {{ monster.monster_image_name | decodeBase64 }} </li>-->

                                <div v-if="editing">
                                    <label>Name:</label>
                                    <input v-model="monster.name" class="input" type="text" name="name" placeholder="Enter Monster Name">
                                </div>

                                <li class="description">{{ monster.description | capitaliseFirstLetter }}</li>
                                <div v-if="editing">
                                    <label>Description:</label>
                                    <textarea v-model="monster.description" class="input" type="text" name="description" placeholder="Enter Monster Description"></textarea>
                                </div>

                                <li class="aggression_level"><strong>Monster Aggression:</strong> {{ monster.aggression_level | capitaliseFirstLetter }}</li>
                                <div v-if="editing">
                                    <label>Aggression Level:</label>
                                    <select v-model="monster.aggression_level" name="aggression_level">
                                        <option disabled value="">Select Aggression Level</option>
                                        <option value="calm">Calm</option>
                                        <option value="confused">Confused</option>
                                        <option value="agitated">Agitated</option>
                                        <option value="chasey">Chasey</option>
                                        <option value="bloodthirsty">Bloodthirsty</option>
                                    </select>
                                </div>
                                <div id="monsterButtons">

                                    <button id="edit" :key="monster.id" class="btn btn-warning" @click="editingMonster(monster)">Edit</button>

                                    <div v-if="!editing">
                                        <button class="btn btn-danger" @click="deleteMonster(monster.id)">Delete</button>
                                    </div>

                                    <div v-else="editing">
                                        <button class="btn btn-success" @click="savingMonster(monster)">Save</button>
                                    </div>

                                    <!--<div v-if="editing">-->

                                    <!--</div>-->
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    /*#mostWanted {*/
        /*display: block;*/
        /*position: relative;*/
    /*}*/
    #monsterButtons {
        text-align: center;
        display: inline-flex;
        button {
            float: right;
            /*margin: 20px;*/
            &#edit {
                margin-right: 20px;
             }
        }
    }
    .newMonster-btn {
        margin-bottom: 30px;
        margin-top: 20px;
    }

    .monsterIndex {
        padding-left: 0;
        padding-bottom: 30px;

        li {
            list-style: none;
            &.name {
                color: #636b6f;
                font-weight: 400;
                font-size: 24px;
                padding: 20px;
            }
            &.monster_image {
                padding-bottom: 10px;
            }
            &.description {
                color: #636b6f;
                font-weight: 200;
                font-size: 18px;
                padding: 20px 20px 0px;

            }
            &.aggression_level {
                color: #636b6f;
                font-weight: 200;
                font-size: 18px;
                padding: 20px;
            }
        }
    }

</style>


<script>

    import NewMonster from '../components/NewMonster.vue';
    import axios from 'axios';


    export default {

        // Apparently watch is typically used when computed method would be more appropriate.
        // I'm keeping this shell as a reminder to look into when I should use this option.

//        watch: {
//            '$route' (to, from) {
//                // Anything put in here will be acted upon each time a route is navigated to or from.
//
//            },
//        },

        data () {
            return {
                monsters: {},
                data: {},
                response: {
                    data: []
                },


                monster: {
                    id: '',
                    name: '',
                    description: '',
                    monster_aggression: '',
                },

                editing: false,
                editingValue:false,
            }
        },

        methods: {

            base64encoded: function (image){
//                $exploded = explode(',', request('monster_image'));
//                $decoded = base64_decode($exploded[1]);
//                if(str_contains($exploded[0], 'jpeg'))
//                    $extension = 'jpeg';
//                else $extension = 'png';
//
//                $filename = request('name').'.'.$extension;
            },

            addMonster(){
                this.$router.push('/monsters/new')
            },

            deleteMonster: function (monsterId) {

                axios.delete('/api/monsters/' + monsterId, {params:
                    {id: monsterId}}).then (
                    response => {
                        console.log('Monster ' + monsterId + ' deleted');
                        console.log(response.data);
                    }
                ).catch(error => console.log(error));
            },

            editingMonster: function (monster) {
                this.editing = true;

                console.log(monster.name);
                console.log(this.key);
            },

            savingMonster: function (monster) {
                this.editing = false;
                console.log(monster);
                axios.put('/api/monsters/' + monster.id, {
                    id: monster.id,
                    name: monster.name,
                    description: monster.description,
                    aggression_level: monster.aggression_level,
            }).then (
                    response => {
                        console.log('Monster ' + monster.id + ' updated');
                        console.log(response);
                    }
                ).catch(error => console.log(error));
            },


        }, // End of methods:
        filters: {
            capitaliseFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            },
            repairImageBase64(image) {
                $exploded = explode('api/monsters/img/', image )
                return $exploded[1];
            },
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
            let self = this;
            axios.get('/api/monsters').then( response => {
//                console.log(response);
                self.monsters = response.data;
                console.log(self.monsters);
            }).catch(error => console.log(error));
            console.log('Component Monsters mounted.');
        },

    }
</script>