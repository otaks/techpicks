<template>
    <div>
        <form method="post" @submit.prevent="onSubmit">
            <div class="form-group">
                <label for="url">URL入力欄</label>
                <div class="col-md-6">
                    <input v-model="url" placeholder="URLを入力することでOGPを生成します" size="50">
                </div>
                <div v-if="errors && errors.url" class="error">
                    <p>{{ errors.url[0] }}</p>
                </div>
            </div>
            <div class="form-group">
                <div v-if="isOgpFound" class="card" style="width: 18rem;">
                    <img v-if="meta.image" class="card-img-top" v-bind:src="meta.image" alt="カードの画像">
                    <div class="card-body">
                        <h5 class="card-title">{{meta.title}}</h5>
                        <p class="card-text">{{meta.description}}</p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="description">コメント入力欄</label>
                <div class="col-md-6">
                    <textarea v-model="comment" placeholder="" :cols="47"></textarea>
                </div>
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
                .then(response => { this.enableOgp(response) })
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
