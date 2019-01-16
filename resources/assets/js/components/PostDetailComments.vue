<template>
  <div class="row">
    <pick-comment v-for="pick in picks" :pick="pick" :login-user-id="userId" :key="pick.id"></pick-comment>
    <infinite-loading @infinite="infiniteHandler">
      <div slot="no-more"></div>
      <div slot="no-results"></div>
    </infinite-loading>
  </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading'
    import PickComment from './PickComment.vue'

    export default {
      created () {
          axios.get('comments/'+this.postId, {
              params: { page: this.page },
            })
            .then(({ data }) => {
                this.picks.push(...data.data)
                this.page++
            })
        },
        props: ['postId','userId'],
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
                    if (data.data.length) {
                      this.picks.push(...data.data)
                      this.page++
                      if (this.page <= data.last_page) {
                        $state.loaded()
                        return
                      }
                    }
                    $state.complete()
                }).catch((error) => {
                    console.log(error)
                })
            },
        }
    }
</script>
