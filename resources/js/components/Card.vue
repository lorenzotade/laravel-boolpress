<template>
  <div class="card mb-4">
    <div class="card-body">
      <h4 class="card-title">{{title}}</h4>
      <h6 class="card-title">{{category}}</h6>
      <p class="card-text">{{truncateText}}</p>
      <p class="card-text">{{FormatDate.format(date)}}</p>
      <router-link class="btn btn-primary" :to="{name: 'postDetail', params:{slug}}">Vai al post</router-link>
    </div>
  </div>
</template>

<script>

import FormatDate from '../classes/FormatDate';

export default {
  name: 'Card',
  data() {
    return {
      FormatDate,
      maxTextLength: 100
    }
  },
  props: [
    'title',
    'category',
    'date',
    'description',
    'slug'
  ],
  computed: {
    truncateText() {
      let text = this.description;
      if (text.length > this.maxTextLength) {
        return text.substr(0, this.maxTextLength) + '...'
      }
      return text
    }
  }
}
</script>

<style>

</style>