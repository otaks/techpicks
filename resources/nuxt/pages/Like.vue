

<template>
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary" v-on:click="decrement" v-if="this.isLiked">いいね ({{this.isLikedCount}})</button>
            <button type="button" class="btn btn-sm btn-outline-secondary" v-on:click="increment" v-else>いいね ({{this.isLikedCount}})</button>
        </div>
    </div>
</template>

<script>
export default {
    props:['pickId','liked','loginUserId','likeCount'],
    data() {
        return{
            isLikedCount: this.likeCount,
            isLiked: this.liked,
        }
    },
    created() {
      this.init()
    },
    methods:{
        init: function() {
          this.getLikedStatus()
        },
        getLikedStatus: function() {
          axios.get("like/status/" + this.pickId + "/" + this.loginUserId)
              .then(({ data }) => {
                  this.isLiked = data.status
              })
        },
        increment: function() {
            axios.get("increment/" + this.pickId + "/" + this.loginUserId)
                .then(({ data }) => {
                    this.isLikedCount = data.is_liked_count
                    this.isLiked = true
                })
        },
        decrement: function() {
            axios.get("decrement/" + this.pickId  + "/" + this.loginUserId)
                .then(({ data }) => {
                    this.isLikedCount = data.is_liked_count
                    this.isLiked = false
                })
        }
    }
}
</script>
