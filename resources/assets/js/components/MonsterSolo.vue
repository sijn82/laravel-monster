<template>
    <div>
        {{ monster }}
        <h1>hello</h1>
    </div>
</template>

<style>

</style>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
            monster: {},
        }},
        created() {
            let self = this;
            axios.get('/api/monsters/' + monster.id).then( response => {
//                console.log(response);
                self.monster = response.data;
                console.log(self.monster)
            }).catch(error => console.log(error));
        },
        mounted() {
            console.log('Monster Solo Mounted.')
        }
    }
</script>