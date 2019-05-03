<template>
    <infinite-loading @infinite="infiniteHandler"></infinite-loading>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading'
    export default {
        props: ['posts', 'apiEndpoint'],
        data() {
            return {
                page: 1,
                list: this.posts.data,
            }
        },
        components: {
            InfiniteLoading
        },
        methods: {
            infiniteHandler($state) {
                this.page += 1
                axios.get(this.apiEndpoint, {
                    params: { page: this.page },
                })
                .then(({ data }) => {
                    if (data.current_page <= data.last_page) {
                        this.list.push(...data.data)
                        if (data.current_page == data.last_page) $state.complete()
                        $state.loaded()
                    } else {
                        $state.complete()
                    }
                }).catch((error) => {
                    console.log(error)
                })
            },
        }
    }
</script>
