<template>
  <main class="container mt-4">

    <h1>I miei post</h1>

    <div 
      class="loader-container"
      v-if="!loaded"
    >
      <Loader />
    </div>

    <div 
      class="card-container"
      v-else
      v-for="post in posts" :key="'p'+post.id"
    >
      <Card 
        :title="post.title"
        :category="post.category"
        :description="post.description"
        :date="post.date"
        :slug="post.slug"
      />
    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li 
          class="page-item"
          :class="{'disabled': pagination.current === 1}"
        >
            <button 
              class="page-link"
              @click="getPosts(pagination.current - 1)"
            >Previous
            </button>
        </li>

        <li 
          class="page-item"
          :class="{'active': pagination.current === i}"
          v-for="i in pagination.last" :key="'i'+i"
        >
          <button 
            class="page-link"
            @click="getPosts(i)"
          >{{i}}
          </button>
        </li>

        <li 
          class="page-item"
          :class="{'disabled': pagination.current === pagination.last}"
        >
            <button 
              class="page-link"
              @click="getPosts(pagination.current + 1)"
            >Next
            </button>
        </li>
      </ul>
    </nav>

  </main>
</template>

<script>

import axios from 'axios';
import Loader from '../components/Loader.vue'
import Card from '../components/Card.vue'

export default {
  name: 'Blog',
  components: {
    Loader,
    Card
  },
  data() {
    return {
      posts: [],
      pagination: {},
      loaded: false
    }
  },
  methods: {
    getPosts(page = 1) {
      this.loaded = false;
      axios.get('http://127.0.0.1:8000/api/posts', {
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
        .catch(err => {
          console.log(err);
        });
        this.loaded = true;
    }
  },
  created() {
    this.getPosts();
  }
}
</script>

<style lang="scss" scoped>

</style>