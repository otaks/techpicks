<template>
    <div class="container">
        <div class="row">
            <div v-for="post in list" class="col-12">
                <card v-bind:post="post">
                    <a slot="pick" v-bind:href="'/picks/create/' + post.id">
                        <button type="button" class="btn btn-sm badge-pill btn-primary">Pick</button>
                    </a>
                </card>
            </div>
            <post-lazy-loadable v-bind:posts="posts" apiEndpoint="/"></post-lazy-loadable>
        </div>
    </div>
</template>

<script>
    import Card from './Card.vue'
    import PostLazyLoadable from './PostLazyLoadable.vue'

    export default {
        mixins: [PostLazyLoadable],
        props: ['posts'],
        data() {
            return {
                list: this.posts.data
            }
        },
        components: {
            Card,
            PostLazyLoadable,
        }
    }
</script>

<style scoped>

</style>