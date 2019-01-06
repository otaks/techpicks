

<template>
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">いいね数 {{this.isLikedCount}}</button>
        </div>
        
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary" v-on:click="decrement" v-if="this.isLiked">いいね</button>

            <button type="button" class="btn btn-sm btn-outline-secondary" v-on:click="increment" v-else>いいね</button>
        </div>
    </div>
</template>

<script>
export default {
    props:["post", "user"],
    name:'like-component',
    data:function(){
        return{
            isLikedCount: this.post.is_liked_count,
            isLiked: this.post.is_liked,
        }
    },
    methods:{
        increment: function() {
            axios.get("increment/" + this.post.id  + "/" + this.user.id)
                .then((r) => {
                    this.isLikedCount = r.data.good_num
                    this.isLiked = true
                })
        },
        decrement: function() {
            axios.get("decrement/" + this.post.id  + "/" + this.user.id)
                .then((r) => {
                    this.isLikedCount = r.data.good_num
                    this.isLiked = false
                })
        }
    }
}
</script>
