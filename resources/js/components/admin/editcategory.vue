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
            @click="updatecategory"
            >
            submit
            </v-btn>
            
        </form>
    </div>
</template>
<script>
export default {
    data(){
    return{
        title:'',
        parentcategory:'',
        items:[]
    }
 },
 created(){
     this.initialize();
     this.getcategory();
 },
 methods:{
     initialize(){
         let self = this;
         self.busy = true;
         axios.get('api/admin/category/'+ self.$route.params.id).then(function (response){
             console.log('hi');
             self.title = response.data.data.title;
             self.parentcategory = response.data.data.parent_id;
         })
         .finally(function (response){
             self.busy = false;
         });
     },
     getcategory(){
         let self = this;
         self.busy = true;
         axios.get('/api/admin/category/all').then(function (response){
             self.items = response.data.data;
         })
         .finally(function (response){
             self.busy = false;
         });
     },
     updatecategory(){
        let self = this;
        self.busy = true;
        axios.patch('/api/admin/category/update/'+self.$route.params.id,{title:self.title}).then(function (response){
            console.log(response);
        })
        .finally(function (response){
            self.busy = false;
        }); 
     }

 }
}
</script>