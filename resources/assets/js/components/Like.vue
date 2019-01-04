

<template>
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">いいね数 {{this.goodNumInternal}}</button>
        </div>
        
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary" v-on:click="decrement(pickIdInternal, userIdInternal)" v-if="this.isLikedInternal">いいね</button>

            <button type="button" class="btn btn-sm btn-outline-secondary" v-on:click="increment(pickIdInternal, userIdInternal)" v-else>いいね</button>
        </div>
    </div>
</template>

<script>
export default {
    props:["post", "user"],
    name:'like-component',
    data:function(){
        return{
            pickIdInternal: this.post.id,
            goodNumInternal: this.post.is_liked_count,
            isLikedInternal: this.post.is_liked,
            userIdInternal: this.user.id
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
