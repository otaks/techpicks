<template>
<div class="col-md-12">
    <div class="card mb-12 shadow-sm" style="padding: 16px;">
      <h5 class="card-title">{{ pick.comment }}</h5>
      <div class="" style="margin: 0 0 0 auto;">
        <div class="btn-group"><button type="button" class="btn btn-sm btn-outline-secondary">いいね数 {{ pick.is_liked_count }}</button></div>
        <div class="btn-group"><button type="button" @click="like" class="btn btn-sm btn-outline-secondary">いいね</button></div>
      </div>
    </div>
</div>
</template>

<script>
export default {
  props: [
    'pick'
  ],
  created() {
    console.log('PicksComponent created.')
  },
  methods: {
    like: function() {
      // TODO use LIKE component
      alert('like!!')
    }
  }
}
</script>
