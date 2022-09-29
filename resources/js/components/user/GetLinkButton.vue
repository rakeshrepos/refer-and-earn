<style>
    td,th {
       padding: 0px 30px;
   }
</style>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex flex-column align-items-center col-lg-12">
                <input 
                    v-on:focus="$event.target.select()" 
                    ref="referUrl" 
                    readonly 
                    class="border-0 focus:border-0 form-control"
                    :value="url"/>
                <button class="btn btn-primary mt-2 mb-2" @click="copy">Copy</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user_id'],
        mounted() {
            this.getUsers()
        },
        data:function(){
            return{
                url: location.protocol+"//"+location.host+"/register/"+this.user_id,
            }
        },
        methods:{
            copy(){
                this.$refs.referUrl.focus();
                document.execCommand('copy');
            },
        }
    }
</script>
