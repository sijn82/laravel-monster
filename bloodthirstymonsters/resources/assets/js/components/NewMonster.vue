
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Monster</div>

                    <div class="panel-body">
                        <p> This section will allow new monsters to be added.</p>

                        <form class="form-horizontal" action="/api/monsters" enctype="multipart/form-data" method="post" name="newMonster" @submit.prevent="uploadMonster">

                            <div class="input-group input-group-md col-md-8 col-md-offset-2">
                                <label class="input-group-addon">Name:</label>
                                <input v-model="form.name" class="form-control" type="text" name="name" placeholder="Enter Monster Name">
                            </div>

                            <div class="input-group input-group-md col-md-8 col-md-offset-2">
                                <label class="input-group-addon">Description:</label>
                                <textarea v-model="form.description" class="form-control description-textarea" type="text" name="description" placeholder="Enter Monster Description"></textarea>
                            </div>

                                <div class="input-group input-group-md col-md-8 col-md-offset-2">
                                    <label class="input-group-addon">Aggression Level:</label>
                                    <select class="form-control" v-model="form.aggression_level" name="aggression_level">
                                        <option disabled value="">Select Aggression Level</option>
                                        <option value="calm">Calm</option>
                                        <option value="confused">Confused</option>
                                        <option value="agitated">Agitated</option>
                                        <option value="chasey">Chasey</option>
                                        <option value="bloodthirsty">Bloodthirsty</option>
                                    </select>
                                </div>

                                <div class="input-group input-group-md col-md-8 col-md-offset-2">
                                    <label class="input-group-addon">Upload Image:</label>
                                    <input class="form-control" type="file" name="monster_image" @change="newFileUpload">
                                </div>

                            <div>
                                <input class="input-group input-group-md col-md-2 col-md-offset-5 btn btn-success" type="submit" value="Upload Image">
                            </div>

                        </form>

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
    .description-textarea {
        height: 150px;
    }
    .input-group {
        margin-bottom: 10px;
    }
    .input-group-addon {
        width: 30%;
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

                form: {
                    name: '',
                    description: '',
                    aggression_level: '',
                    monster_image: ''
                },
                // Need to check whether this is used, or the other one?
                monster_image: '',
                userData: {},

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

            uploadMonster: function () {

                let self = this;
                axios.post('/api/monsters', {
                    name: self.form.name,
                    description: self.form.description,
                    aggression_level: self.form.aggression_level,
                    monster_image: self.form.monster_image,
                    user_id: self.userData.id
                }).then(function (response) {
                    console.log(response.data);
                    console.log('saved monster successfully, or have i?');
                }).catch(error => console.log(error));

                this.$router.push('/monsters')
            }

        },

        created() {
            axios.get('/api/user').then(
                response => {
                    console.log(response);
                    this.userData = response.data;
                }).catch(error => console.log(error));
            },

        mounted() {
            console.log('Component New Monsters mounted.');
        }
    }
</script>