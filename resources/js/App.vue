<template>

  <div class="container">
    
    <article 
      class="my-5"
      v-for="post in posts" :key="post.id"
    >
      <h3>{{post.title}}</h3>
      <h6>{{post.category}}</h6>
      <h5>{{formatDate(post.date)}}</h5>
    </article>

    <button 
      class="btn btn-primary mr-2"
      @click="getPosts(pagination.current - 1)"
      v-if="pagination.current > 1"
    >PREV.</button>

    <button 
      class="btn btn-primary"
      @click="getPosts(pagination.current + 1)"
      v-if="pagination.current < pagination.last"
    >NEXT</button>

  </div>

</template>

<script>

import axios from 'axios';

export default {
  name: 'App',
  data() {
    return {
      apiUrl: 'http://127.0.0.1:8000/api/posts',
      posts: [],
      pagination: {}
    }
  },
  methods: {
    getPosts(page = 1) {
      axios.get(this.apiUrl, {
        params: {
          page: page
        }
      })
        .then(res => {
          this.posts = res.data.data;
          this.pagination = {
            current: res.data.current_page,
            last: res.data.last_page
          }
        })
    },
    formatDate(date) {
      const d = new Date(date);
      let day = d.getDate();
      let month = d.getMonth() + 1;
      const year = d.getFullYear();

      if (day < 10) day = '0' + day;
      if (month < 10) month = '0' + month;

      return `${day}/${month}/${year}`
    }
  },
  created() {
    this.getPosts()
  }
}
</script>

<style lang="scss">

  @import '../sass/frontoffice/global';

</style>