<template>
    <div class="row border border-secondary mb-3 p-1">
        <div class="align-self-center col-2 col-sm-1 col-md-1 col-lg-1">
            <img class="rounded-circle" v-bind:src="post.image" alt="Generic placeholder image" width="30" height="30">
        </div>
        <div class="post-comment col-10 col-sm-11 col-md-11 col-lg-11">
            {{post.top_comment}}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post'],
    }
</script>

<style scoped lang="scss">
    .post-comment {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
    }
</style>