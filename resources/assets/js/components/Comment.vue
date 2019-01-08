<template>
    <div class="comment-container">
        <div class="row border border-secondary p-1 mb-3">
            <div class="picked-avator align-self-center col-2">
                <img class="rounded-circle" v-bind:src="post.image" alt="Generic placeholder image" width="30" height="30">
            </div>
            <div class="post-comment col-10">
                {{post.top_comment}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post'],
    }
</script>

<style scoped lang="scss">
    .comment-container {
        .row {
            @extend .row;
            margin-left: -0px;
            margin-right: -0px;
        }
        .picked-avator {
            padding-right: 5px;
            padding-left: 5px
        }
        .post-comment {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
        }
    }
</style>