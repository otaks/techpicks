<template>
<div class="col-md-12">
    <div class="card mb-12 shadow-sm" style="padding: 16px;">
      <h5 class="card-title">{{ pick.comment }}</h5>
      <div class="" style="margin: 0 0 0 auto;">
        <like :pick-id="pick.id" :like-count="pick.is_liked_count" :liked="pick.id === loginUserId" :login-user-id="loginUserId"></like>
      </div>
    </div>
</div>
</template>

<script>
export default {
  props: [
    'pick','loginUserId'
  ]
}
</script>
