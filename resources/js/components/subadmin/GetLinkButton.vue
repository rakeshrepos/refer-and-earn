<style>
    td,th {
       padding: 0px 30px;
   }
</style>
<template>
    <div class="w-full flex justify-around">
        <div class="w-full flex flex-col items-center">
            <div v-if="url!=''" class="flex w-full justify-center">
                <input v-on:focus="$event.target.select()" ref="referUrl" class="bg-green-200 px-2 py-1 rounded-md border-0 focus:outline-none" readonly :value="url"/>
            </div>
           
            <button class="mt-3 bg-blue-600 w-[6rem] px-4 py-2 rounded-lg text-white" type="button" @click="copy">Copy</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user_id'],
        data:function(){
            return{
                url: location.protocol+"//"+location.host+"/register/"+this.user_id,
            }
        },
        methods:{
            copy(){
                this.$refs.referUrl.focus();
                document.execCommand('copy');
            }
        }
    }
</script>
