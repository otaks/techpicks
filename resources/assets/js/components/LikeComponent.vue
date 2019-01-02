

<template>
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">いいね数 {{this.goodNumInternal}}</button>
        </div>
        
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary" v-on:click="decrement(pickId, userId)" v-if="this.isLikedInternal">いいね</button>

            <button type="button" class="btn btn-sm btn-outline-secondary" v-on:click="increment(pickId, userId)" v-else>いいね</button>
        </div>
    </div>
</template>

<script>
export default {
    props:["goodNum", "pickId", "userId", "isLiked"],
    name:'like-component',
    data:function(){
        return{
            goodNumInternal: this.goodNum,
            isLikedInternal: this.isLiked
        }
    },
    methods:{
        increment: function($pid, $uid) {
            axios.get("increment/" + $pid  + "/" + $uid)
                .then((r) => {
                    this.goodNumInternal = r.data.good_num
                    this.isLikedInternal = true
                })
        },
        decrement: function($pid, $uid) {
            axios.get("decrement/" + $pid  + "/" + $uid)
                .then((r) => {
                    this.goodNumInternal = r.data.good_num
                    this.isLikedInternal = false
                })
        }
    }
}
</script>
