<template>
    <div>
        <v-container>
            <v-row>
                <v-col cols="4" v-for="(category,a_index) in categories" :key="a_index">
                   

                      <v-card
                        class="mx-auto"
                        color="#26c6da"
                        dark
                        max-width="400"
                        >
                        <v-card-title>
                            <span class="title font-weight-light"> {{ category.title }}</span>
                        </v-card-title>
                    
                    
                        
                        </v-card>

                </v-col>
                
            </v-row>
        </v-container>
    </div>
</template>
<script>
export default {
    data(){
        return {
            categories:[],
            category:[]
        }
    },
    created(){
        this.initialize();
    },
    methods:{
        initialize(){
            let self = this;
            self.busy = true;
            axios.get('/api/admin/category/all').then(function (response){
                console.log('good keep it up');
                self.categories = response.data.data;
            })
            .finally(function (response){
                self.busy = false;
            });
        }
    }
}
</script>