<template>
  <div>
    <h1>Login Succeeded!</h1>
    <img :src="'data:image/jpeg;base64, '+this.userImage" alt="avatar" />
    こんにちは、{{$auth.$state.user.name}}さん! 
    <button @click=logout>Logout</button>
  </div>
</template>

<script>
export default {

  methods: {
    logout() {
      this.$auth.logout();
    },
  },
  data(){
    return {
      userImage: "",
      type: ""
    }
  },
  mounted() {
    this.$axios.get(
      (this.$auth.$state.user.picture.data.url).replace('https://platform-lookaside.fbsbx.com/platform/profilepic/','https://localhost:3000/api/'), 
      { 
        responseType : 'arraybuffer',
      }
    )
    .then(response => {
        console.log('response.data', response.data.length);
        const base64 = new Buffer(response.data, "binary").toString("base64");
        //type = response.headers["content-type"];
        this.userImage = base64;
    });

  }
};
</script>