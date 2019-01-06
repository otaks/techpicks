<template>
    <div class="container">
        <div class="row">
            <div v-for="post in list" class="col-12">
                <card v-bind:post="post"></card>
            </div>
            <post-lazy-loadable v-bind:posts="posts" apiEndpoint="/mypage"></post-lazy-loadable>
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
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped lang="scss">

</style>