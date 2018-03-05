
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Monster</div>

                    <div class="panel-body">
                        <p> This section will allow new monsters to be added.</p>

                        <!--UPLOAD-->
                        <!--<form action="/api/monsters" enctype="multipart/form-data" method="post" name="newMonster" @submit.prevent="uploadMonster">-->
                            <!--&lt;!&ndash;{{csrf_field()}}&ndash;&gt;-->
                            <!--<div>-->
                                <!--<label>Name:</label>-->
                                <!--<input v-model="form.name" class="input" type="text" name="name" placeholder="Enter Monster Name">-->
                            <!--</div>-->
                            <!--<div>-->
                                <!--<label>Description:</label>-->
                                <!--<textarea v-model="form.description" class="input" type="text" name="description" placeholder="Enter Monster Description"></textarea>-->
                            <!--</div>-->
                            <!--<div>-->
                                <!--<label>Aggression Level:</label>-->
                                <!--<select v-model="form.aggression_level" name="aggression_level">-->
                                    <!--<option disabled value="">Select Aggression Level</option>-->
                                    <!--<option value="calm">Calm</option>-->
                                    <!--<option value="confused">Confused</option>-->
                                    <!--<option value="agitated">Agitated</option>-->
                                    <!--<option value="chasey">Chasey</option>-->
                                    <!--<option value="bloodthirsty">Bloodthirsty</option>-->
                                <!--</select>-->
                            <!--</div>-->
                            <!--&lt;!&ndash;<div>&ndash;&gt;-->
                                <!--&lt;!&ndash;<label>Upload Image:</label>&ndash;&gt;-->
                                <!--&lt;!&ndash;<input type="file" name="monster_image">&ndash;&gt;-->
                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                            <!--&lt;!&ndash;<div>&ndash;&gt;-->
                                <!--&lt;!&ndash;<input type="submit" class="btn" value="Upload Image">&ndash;&gt;-->
                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                            <!--<div>-->
                                <!--<input type="submit" class="btn btn-success" value="Save Monster">-->
                                <!--&lt;!&ndash;<input type="submit" class="btn btn-success" value="Save Monster">Save Monster</input>&ndash;&gt;-->
                            <!--</div>-->
                        <!--</form>-->

                        <form action="/api/monsters" enctype="multipart/form-data" method="post" name="newMonster" @submit.prevent="uploadMonster">
                            <!--{{csrf_field()}}-->
                            <div>
                                <label>Name:</label>
                                <input v-model="form.name" class="input" type="text" name="name" placeholder="Enter Monster Name">
                            </div>
                            <div>
                                <label>Description:</label>
                                <textarea v-model="form.description" class="input" type="text" name="description" placeholder="Enter Monster Description"></textarea>
                            </div>
                            <div>
                            <label>Aggression Level:</label>
                            <select v-model="form.aggression_level" name="aggression_level">
                                <option disabled value="">Select Aggression Level</option>
                                <option value="calm">Calm</option>
                                <option value="confused">Confused</option>
                                <option value="agitated">Agitated</option>
                                <option value="chasey">Chasey</option>
                                <option value="bloodthirsty">Bloodthirsty</option>
                            </select>
                            </div>
                            <div>
                                <label>Upload Image:</label>
                                <input type="file" name="monster_image" @change="newFileUpload">
                            </div>
                            <div>
                                <input type="submit" class="btn" value="Upload Image">
                            </div>
                        </form>
                        <!--<img src="storage/img/pensiveclem.png">-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


    <!-- SASS styling -->
    <style lang="scss" scoped>

    .navBar.nav a[href="http://bloodthirstymonsters.local/monsters"] {
        font-weight: bold;
        color: red;
    }
    form input[type="file"] {
        display: inline-flex;
    }

    .dropbox {
        outline: 2px dashed grey; /* the dash box */
        outline-offset: -10px;
        background: lightcyan;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px; /* minimum height */
        position: relative;
        cursor: pointer;
    }

    .input-file {
        opacity: 0; /* invisible but it's there! */
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }

    .dropbox:hover {
        background: lightblue; /* when mouse over to the drop zone, change color */
    }

    .dropbox p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 0;
    }
</style>

<script>
    import axios from 'axios';
    export default {

        data () {
            return {

                // This first set, initialise the form inputs as empty strings

                form: {
                    name: '',
                    description: '',
                    aggression_level: '',
                    monster_image: ''
                },
                monster_image: '',

            }
        },

        methods: {

            newFileUpload(event) {
            let fileReader = new FileReader();
            fileReader.readAsDataURL(event.target.files[0])
                fileReader.onload = (event) => {
                this.form.monster_image = event.target.result
                }
            },

            uploadImage: function () {
                console.log(this.Data);
                let data = new FormData();
                data.set('monster_image', this.monster_image);
                axios.post('/api/monsters/img', {data})
                    .then(function (response) {
                        console.log(response);
                        console.log('image uploaded');
//                        console.log(response.data.monster_image);
                    })
                    .catch(error => console.log(error));


                this.$router.push('/monsters/new')
            },

            uploadMonster: function () {

//                axios.post('/monsters/new', this.$data)
////                    .then(response => {})
//                ;

                let self = this;
                axios.post('/api/monsters', {
                    name: self.form.name,
                    description: self.form.description,
                    aggression_level: self.form.aggression_level,
                    monster_image: self.form.monster_image
                }).then(function (response) {
//                        console.log(response.data.monster_image);
                    console.log(response.data);
                    console.log('saved monster successfully, or have i?');
                }).catch(error => console.log(error));

                this.$router.push('/monsters')
            }

        },

        created() {
          // Use this to fetch any existing API data before initialising the component, so for example
//           axios.get('/monsters/new').then( response => {
////               this.monsters = response.data
//               console.log(response);
//           });
          // would be better placed here than in mounted.

        },
        mounted() {
            console.log('Component New Monsters mounted.');
        }
    }
</script>