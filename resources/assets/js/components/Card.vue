<template>
    <div class="card col col-sm col-md shadow-sm mb-4">
        <a href="/posts/detail/post.id"><img class="card-img-top" v-bind:src="post.image" alt="Card image cap"></a>
        <div class="card-body">
            <h4 class="card-title post-title">{{post.title}}</h4>
            <p class="card-text post-description">{{post.description}}</p>
            <comment v-bind:post="post"></comment>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">総コメント数 ({{post.is_picked_count}})</button>
                </div>
                <slot name="pick"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import Comment from './Comment.vue'
    export default {
        props: ['post'],
        components: {
            Comment,
        }
    }
</script>

<style scoped lang="scss">
    .card-body {
        @extend .card-body;
        width: 100%;
        .post-title {
            line-height: 1.3;
        }
        .post-title,
        .post-description {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
        }
    }
</style>