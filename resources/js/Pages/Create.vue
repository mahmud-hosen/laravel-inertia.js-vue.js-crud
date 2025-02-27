<template>
  <div class="row justify-content-center">
    <div class="col-md-7">
      <h1>Create Post</h1>

      <form @submit.prevent="submit">

        <div class="form-group">
          <label for="title">Title: </label>
          <input v-model="form.title" :maxlength="maxLength" type="text" class="form-control" placeholder="Enter title" />

          <div>
            <span>Total characters:  {{ total }} </span>
          </div> 

          <div class="text-danger">
            <li v-if="total > 10">Character limit exceeded.</li>
            <li v-if="form.errors.title">{{ form.errors.title }}</li>
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

      <div><label class="typo__label">Tagging</label>
      <multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" 
      label="name" track-by="code" :options="options" :multiple="true" :taggable="true"  
      @tag="addTag" >
      </multiselect>
      <pre class="language-json"><code>{{ value }}</code></pre>
  </div>

    </div>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import Multiselect from 'vue-multiselect'

export default {

  mounted() {
      console.log("Mounted");
  },

  computed: {

    total() {
      console.log('yes');
      return this.form.title.length;
    },

  },

  components: { Multiselect },

  data() {
    return {
      category: "",
      value: [
        {name: 'Javascript', code: 'js'}
      ],
      options: [
        {name: 'Vue.js', code: 'vu'},
        {name: 'Javascript', code: 'js'},
        {name: 'Open Source', code: 'os'}
      ],
      maxLength: 100 ,
      x:[],
      y:1
  
    };
  },


  methods: {
    
    addTag (newTag) {

      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      this.options.push(tag)
      this.value.push(tag)
    },

  },


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

<style>
  @import 'vue-multiselect/dist/vue-multiselect.css';
</style>