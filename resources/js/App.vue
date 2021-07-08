<template>

  <main class="container">
    <Header/>
    <router-view></router-view>
  </main>

</template>

<script>

import Header from './components/Header.vue';

export default {
  name: 'App',
  components: {
    Header
  },
  data() {
    return {
      
    }
  },
  methods: {
    
   
  },
  created() {
   
  }
}
</script>

<style lang="scss">

  @import '../sass/frontoffice/global';

</style>