<template>
    <div>
        <form method="post" @submit.prevent="onSubmit">
            <div class="form-group">
                <label for="url">URL入力欄</label>
                <input class="form-control" v-model="url" placeholder="URLを入力することでOGPを生成します">
                <div v-if="errors && errors.url" class="error">
                    <p>{{ errors.url[0] }}</p>
                </div>
            </div>
            <div class="form-group">
                <div v-if="isOgpFound" class="card">
                    <img v-if="meta.image" class="card-img-top" v-bind:src="meta.image" alt="カードの画像">
                    <div class="card-body">
                        <h5 class="card-title">{{meta.title}}</h5>
                        <p class="card-text">{{meta.description}}</p>
                    </div>
                </div>
            </div>
            <div class="form-group" id="comment">
                <label for="description">コメント入力欄</label>
                <textarea class="form-control" v-model="comment" placeholder="" ref="comment"></textarea>
                <div v-if="errors && errors.comment" class="error">
                    <p>{{ errors.comment[0] }}</p>
                </div>
            </div>
            <div class="form-group">
                <button v-bind:disabled="!isOgpFound || isProcessing" type="submit" class="btn btn-block btn-primary mt-5">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
    import vueSmoothScroll from 'vue-smoothscroll'
    Vue.use(vueSmoothScroll)
    export default {
        data() {
          return {
              url: '',
              comment: '',
              errors:{},
              meta: {},
              isOgpFound: false,
              isProcessing: false,
          }
        },
        watch: {
          url() {
              this.analyseOgp()
          },
        },
        methods: {
            onSubmit() {
                this.isProcessing = true;
                axios.post('/posts/create', this.createPostData())
                    .then(response => window.location.href='/mypage')
                    .catch(e => { this.errorHandling(e.response) });
            },
            createPostData() {
                return {
                    'url': this.meta.url || this.url,
                    'title': this.meta.title,
                    'description' : this.meta.description,
                    'image': this.meta.image,
                    'comment': this.comment,
                }
            },
            analyseOgp() {
                axios.get('/api/ogps/analysis', {
                    params: { 'url': this.url },
                })
                .then(response => {
                    this.enableOgp(response)
                    this.$nextTick(() => { this.$refs.comment.focus() })
                    this.$SmoothScroll(document.querySelector('#comment'), 400, null, null, 'y')
                })
                .catch(e => { this.errorHandling(e.response) })
            },
            enableOgp(response) {
                this.meta = response.data
                this.isOgpFound = true
                this.errors.url = {}
            },
            errorHandling(response) {
                if ((response.data.exception) || (response.data.errors && response.data.errors.url)) this.disableOgp(response)
                this.setFormRequestError(response)
            },
            disableOgp(response) {
                this.meta = {}
                this.isOgpFound = false
            },
            setFormRequestError(response) {
                this.errors = response.data.errors || {}
                this.isProcessing = false
            },
        },
        mounted() {
        }
    }
</script>
<style scoped lang="scss">
    .card {
        @extend .card;
        width: 100%;
    }
    .card-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 5;
        overflow: hidden;
    }
</style>
