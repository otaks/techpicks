<template>
  <div> 

    <div class="container back">
      <b-button class="back__button" @click="loginWithFacebook">Facebookでログイン</b-button>
    </div>  
  </div>
</template>

<style scoped lang="sass">
  .back
    
    isplay: flex;
    align-items: center;
    justify-content: center;
    &__button
      background-color: #36549D;
      color: #ffffff;
</style>

<script>
export default{

  async asyncData({app}){
    const data = await app.$axios.$get('http://localhost:8000/api')
    return {data};
  },
  methods:{
    loginWithFacebook: function () {
      this.$auth.loginWith('facebook')
    },    
    async handleClick (){
      //this.$axios.$post('http://localhost:8000/login')
      //await this.$axios.$post('http://localhost:8000/api/auth/login', {
      await this.$axios.$post('http://localhost:8000/api/auth/login', {
        email: 'zieme.javonte@example.com',
        password: 'secret'
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });      
    }
  }
  
};
</script>