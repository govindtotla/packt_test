<template>
  <div class="row">
    <masonry
      :cols="{default: 4, 1000: 3, 700: 2, 400: 1}"
      :gutter="{default: '30px', 700: '15px'}"
      >
    <div v-for="(product, i) in posts.products" :key=i>
      <div class="card mt-4">
        <div class="card-body">
          <p class="card-text"><strong>{{ product.title }}</strong> <br>
            {{ product.concept }}
          </p>
          <p>{{ new Date(product.publication_date).toLocaleString() }}</p>
        </div>
        <button class="btn btn-success m-2" @click="viewPost(i)">Details</button>
      </div>
    </div>
    </masonry>

    <el-dialog v-if="currentPost" :visible.sync="postDialogVisible" width="40%">
      <span>
        <h3>{{ currentPost.title }}</h3>
        <hr>
        <p><strong>Concept</strong>: {{ currentPost.concept }}</p>
        <p><strong>Language</strong>: {{ currentPost.language }}</p>
        <p><strong>Tool</strong>: {{ currentPost.tool }}</p>
        <p><strong>Vendor</strong>: {{ currentPost.vendor }}</p>
        <p><strong>Publication Date</strong>: {{ currentPost.publication_date }}</p>
        <p><strong>ISBN</strong>: {{ currentPost.isbn13 }}</p>
      </span>
      <span slot="footer" class="dialog-footer">
        <el-button type="primary" @click="postDialogVisible = false">Okay</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
  name: 'all-posts',
  data() {
    return {
      postDialogVisible: false,
      currentPost: '',
    };
  },  
  computed: {
    ...mapState(['posts'])
  },  
  beforeMount() {
    this.$store.dispatch('getAllPosts');
  }, 
  methods: {    
    viewPost(postIndex) {
      const post = this.posts.products[postIndex];
      this.currentPost = post;
      this.postDialogVisible = true;
    }
  },
}
</script>
