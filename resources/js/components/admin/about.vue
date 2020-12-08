<template>
    <div>
        <form>
            <v-text-field
            v-model="title"
            :counter="20"
            label="Name"
            required
            ></v-text-field>
           <v-select
            v-model="parentcategory"
            :items="items"
             label="Select category"
             item-text="title"
             item-value="id"
            required
          ></v-select>
            

            <v-btn
            class="mr-4"
            @click="submit"
            >
            submit
            </v-btn>
            
        </form>
    </div>
</template>
<script>
  

  export default {
    data: () => ({
        title: '',
        parentcategory: null,
        items: [],
    }),

    created(){
        this.initialize();
    },

    methods: {
        initialize(){
            let self = this;
            axios.get('/api/admin/category/parent').then(function (response){
                console.log(response.data.data);
                self.items = response.data.data;
            });
        },
      submit () {
          let self = this;
          self.busy = true;
        axios.post('/api/admin/category/save',{title:self.title,parentcategory:self.parentcategory}).then(function (response){
            console.log(response);
            self.data = response;
            // this.$swal('Hello word!','this is test;')
            
        })
        .finally(function (response){
          self.busy = false;  
        })
      },
      
    },
  }
</script>