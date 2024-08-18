<template>
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div>
        <h1 class="float-left">Posts List</h1>
        <button @click="post_create()" class="mt-2 btn btn-primary float-right">Create</button>
      </div>
    
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th>SI</th>
            <th>Title</th>
            <th>Content</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <tr v-for="(post , index ) in posts" :key="post.id" >
            <td> {{ index + 1}} </td>
            <td> {{ post.title }} </td>
            <td> {{ post.content }}</td>
            <td>
              <div>
                <button @click="edit_post(post.id)" class="btn btn-warning">Edit</button>
                <button @click="delete_post(post.id)" class="ml-1 btn btn-danger">Delete</button>
              </div>
            </td>
          </tr>

        </tbody>
      </table>

    </div>
  </div>
</template>

<script>


export default {

  props: {
    posts: Array,
  },
  methods: {

    delete_post(id) {
      if (confirm('Are you sure you want to delete this post?')) {
        this.$inertia.delete(`/posts/${id}`);
      }
    },

    edit_post(id) {
        this.$inertia.get(`/posts/${id}`);
    },

    post_create() {
        this.$inertia.get(`/create/`);
    },

  },
}
</script>
