<template>
  <div>
    <nav class="level is-mobile myfooter">
      <p class="level-item has-text-centered">
        <a class="">
          <font-awesome-icon class="myfooter__icon" icon="home"/>
          
          <div class="myfooter__str">Home</div>
        </a>
      </p>
      <p class="level-item has-text-centered">
        <a class="">
          <font-awesome-icon class="myfooter__icon" icon="search"/>
          <div class="myfooter__str">Search</div>
        </a>
      </p>
      <p class="level-item has-text-centered">
        <a class="link is-info">
          <font-awesome-icon class="myfooter__icon" icon="chart-line"/>
          <br>
          <div class="myfooter__str">Trend</div>
        </a>
      </p>
      <p class="level-item has-text-centered">
        <a class="link is-info">
          <font-awesome-icon class="myfooter__icon" icon="user"/>
          <br>
          <div class="myfooter__str">Me</div>
        </a>
      </p>
      <p class="level-item has-text-centered">
        <a class="link is-info">
          <font-awesome-icon class="myfooter__icon" icon="pen"/>
          <br>
          <div class="myfooter__str">Pick</div>
        </a>
      </p> 
    </nav>
  </div>
</template>

<script>
  export default{
    name: "MyFooter"
  }
</script>

<style scoped lang="sass">
  .myfooter
    background-color: #DBDBDB;
    height: 60px;
    color: #707070;
    &__icon
      font-size: 20px;
      color: #707070;  
    &__str
      font-size: 10px;
      color: #707070;
</style>



