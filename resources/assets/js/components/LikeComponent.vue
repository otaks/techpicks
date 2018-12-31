

<template>
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">いいね数 {{goodNum}}</button>
        </div>
        
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary" v-on:click="increment(pickId, userId)">いいね</button>

            <button type="button" class="btn btn-sm btn-outline-primary" v-on:click="decrement(pickId, userId)">いいね</button>
        </div>
    </div>
</template>

<script>
export default {
    props:["goodNum", "pickId", "userId", "isLiked"],
    name:'like-component',
    methods:{
        increment: function($pid, $uid) {
            axios.get("increment/" + $pid  + "/" + $uid)
                .then((r) => {
                    this.goodNum = r.data.good_num
                    this.isLiked = "true"
                })
        },
        decrement: function($pid, $uid) {
            axios.get("decrement/" + $pid  + "/" + $uid)
                .then((r) => {
                    this.goodNum = r.data.good_num
                    this.isLiked = "false"
                })
        }
    }
}
</script>
