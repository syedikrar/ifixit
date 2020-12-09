<template>
    <div>
         <v-card>
            <v-card-title>
                Categories
                <v-spacer></v-spacer>
                <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Search"
                single-line
                hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table
                :headers="headers"
                :items="desserts"
                :search="search"
            >
               <template v-slot:item.action="{ item }">
                  <v-btn class="mr-2 primary" :to="'/admin/editcategory/'+item.id">
                       <v-icon small>mdi-lead-pencil</v-icon>Edit
                   </v-btn>
                   <v-btn class="mr-2 error" @click="deletecategory(item.id)"> 
                        <v-icon small>mdi-delete-outline</v-icon>Delete   
                    </v-btn> 
               </template>


                <!-- <template v-slot:item.action="{ item }">
                    <v-btn icon class="mr-2" color="accent" :to="'/note/'+item.id">
                        <v-icon>mdi-lead-pencil</v-icon>
                    </v-btn>
                    <confirmable :target="item" :name="'Student Note'" @delete="deleteItem">
                        <v-btn icon color="error">
                            <v-icon>mdi-delete-outline</v-icon>
                        </v-btn>
                    </confirmable>
                </template>  -->
            </v-data-table>
            </v-card>    
    </div>    
</template>
<script>
export default {
    data () {
    return {
    dialog: false,
      search: '',
      title:'',
      editedIndex: -1,
      headers: [
        { text: 'Title',value: 'title' },
        { text: 'Parent Categories', value: 'parent_id' },
        // {text: 'Actions', value: 'action', sortable: false, width: 200},
        { text:'Actions', value:'action' }
      ],
      desserts: []
    }
},
created(){
    this.initialize();
},
methods: {
    initialize(){
        let self = this;
        axios.get('/api/admin/category/all').then(function (response){
            console.log(response.data.data);
            self.desserts = response.data.data;
        })
        .finally(function (response){
            //do your staff 
        });
    },
    editcategory(categoryid){
        alert(categoryid);
        let self = this;
        
        axios.get('/api/admin/category/'+ categoryid).then(function (response){
            self.title = response.data.data.title;
        })
        .finally(function(response){
            //do your staff
        });
    },
    updateCategory(categoryid){
        alert(categoryid);
        let self = this;
        self.busy = true;
        axios.patch('/api/admin/category/update/'+ categoryid, {title:self.title}).then(function (response){
            console.log(response);
        });
    },
    deletecategory(id){
       let self = this;
       self.busy = true;
       axios.delete('/api/admin/deletecategory/'+id).then(function (response){
           self.initialize();
       })
       .finally(function (response){
           self.busy = false;
       });
    }

}
}
</script>