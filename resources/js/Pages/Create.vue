<template>
  <div class="row justify-content-center">
    <div class="col-md-7">
      <h1>Create Post</h1>

      <form @submit.prevent="submit">

        <div class="form-group">
          <label for="title">Title:</label>
          <input v-model="form.title" type="text" class="form-control" placeholder="Enter title" />

          <div v-if="form.errors.title" class="text-danger">
            {{ form.errors.title }}
          </div>

        </div>

        <div class="form-group">
          <label for="comment">Content:</label>
          <textarea v-model="form.content" class="form-control" rows="5" placeholder="Enter content"></textarea>
          
          <div v-if="form.errors.content" class="text-danger">
            {{ form.errors.content }}
          </div>

        </div>
        <button type="submit" class="btn btn-success">Submit</button>

      </form>

    </div>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

export default {
  setup() {

    const form = useForm({
      title: '',
      content: '',
    });

    function submit() {
      form.post('/store');
    }

    return { form, submit };
  },
}
</script>
