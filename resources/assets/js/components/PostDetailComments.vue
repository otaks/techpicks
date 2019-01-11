<template>
  <div class="row">
    <pick-comment v-for="pick in picks" :pick="pick" :key="pick.id"></pick-comment>
    <infinite-loading @infinite="infiniteHandler"></infinite-loading>
  </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading'
    import PickComment from './PickComment.vue'

    export default {
      created () {
          axios.get('comments/'+this.postId+'?page=1', {
              params: { page: this.page },
            })
            .then(({ data }) => {
                const value = Object.values(data.data)
                this.picks.push(...value)
                this.page++
            })
        },
        props: ['postId'],
        data() {
            return {
                page: 1,
                picks: []
            }
        },
        components: {
            InfiniteLoading, PickComment
        },
        methods: {
            infiniteHandler($state) {
                axios.get('comments/'+this.postId, {
                    params: { page: this.page },
                })
                .then(({ data }) => {
                    const value = Object.values(data.data)
                    if (value.length) {
                      this.picks.push(...value)
                      this.page++
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
