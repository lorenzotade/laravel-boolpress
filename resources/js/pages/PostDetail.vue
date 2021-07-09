<template>
  <div class="card mb-4">
    <div class="card-body">
      <h4 class="card-title">{{post.title}}</h4>
      <h6 class="card-title" v-if="post.category">{{post.category.name}}</h6>
      <p class="card-text">{{post.description}}</p>
      <p class="card-text">{{FormatDate.format(post.created_at)}}</p>
    </div>
  </div>
</template>

<script>

import axios from 'axios';
import FormatDate from '../classes/FormatDate';

export default {
  name: 'PostDetail',
  data() {
    return {
      post: {},
      FormatDate
    }
  },
  mounted() {
    axios.get('http://127.0.0.1:8000/api/posts/' + this.$route.params.slug)
      .then(res => {
        if (res.data.success) {
          this.post = res.data.data;
        } else {
          this.$router.push({name: 'error404'});
        }
      })
      .catch(err => {
        console.log(err);
      })
  }
}
</script>

<style>

</style>