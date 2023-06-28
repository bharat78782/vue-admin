<template>
    <div class="wrapper">
     

      <Navbar />
      <Sidebar />
  
      <!-- Content Wrapper -->
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Add Color</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Main content -->
        <section class="content">

<!-- Default box -->
            <div class="card">
                <div class="card-body row">
                
                    <div class="col-12">
                        <form  @submit.prevent="addColor()">
                            <div class="form-group">
                                <label for="inputName">Color Name</label>
                                <input type="text" id="color_name" v-model="color_name" :class="{ 'is-invalid': formErrors.color_name }"  class="form-control" />
                                <input type="hidden" v-model="color_id" id="color_id">

                                <div class="invalid-feedback" v-if="formErrors.color_name">
                                    {{ formErrors.color_name }}
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Color</label>
                                <input type="color" id="color"  v-model="color" :class="{ 'is-invalid': formErrors.color }"  class="form-control" />

                                <div class="invalid-feedback" v-if="formErrors.color">
                                    {{ formErrors.color }}
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Color Name</th>
                                    <th>Color</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                    <tr v-for="color in getColors" :key="color.id">
                                    <td>{{ color.color_name }}</td>
                                    <td>{{ color.color }}</td>
                                    <td>active</td>
                                    <td>
                                        <a href="#!" @click="deleteColor(color.id)">Delete</a> &nbsp;
                                        <a href="#!" @click="editColor(color.id)" >edit</a>
                                    </td>
                                </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            </section>
      </div>
  
      <!-- Footer -->
    
      <Footers />
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
  </template>
  
  <script>
    import Sidebar from '../Sidebar.vue';
    import Navbar from '../Navbar.vue';
    import Footers from '../Footers.vue';
    import axios from 'axios';
    import toastr from 'toastr';
    import 'admin-lte/plugins/toastr/toastr.css';
    export default {
    name: 'AddColor',
        components: {
        Sidebar,
        Navbar,
        Footers,
    
    },
    methods:{

    },
    data() {
        return {
        color_name: '',
        color_id: null,
        color: '',
        colorsStoreRoute: '/api/colors/store',
        formErrors:{},
        getColors: [] ,
        colors : null,
      
        };
  },


    mounted(){
        this.viewColor();
    },
   
    methods: {
        addColor(){
            const addData = {
                color_name:this.color_name,
                color:this.color,
            };
            const token = localStorage.getItem('token');
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            
            if(this.color_id)
            {
                axios.patch(`/api/colors/update/${this.color_id}`,addData).then(response=>{
               
                toastr.success(response.data.message, false);
                this.viewColor();
                this.clearFields();
            }).catch(error=>{
                toastr.error(error.response.data.message, false);
            });
            }else{

            axios.post(this.colorsStoreRoute,addData).then(response=>{
              ;
                toastr.success(response.data.message, false);
                this.viewColor();
                this.clearFields();
            }).catch(error=>{
                toastr.error(error.response.data.message, false);
            });
          }
        },
        viewColor(){
            const token = localStorage.getItem('token');
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            axios.get('/api/colors/index').then(response=>{
                this.getColors = response.data.data; 
              
            }).catch(error=>{
                toastr.error('something went wrong');
            });
        },
        deleteColor(colorId)
        {
            const confirmed = window.confirm('Are you sure you want to delete this color?');
            if (!confirmed) {
                return; 
             }
             const token = localStorage.getItem('token');
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            axios.delete(`/api/colors/destroy/${colorId}`).then(response=>{
                toastr.success(response.data.message, false);
                this.viewColor();
            }).catch(error=>{
                toastr.error('Something went wrong',false);
            });
        },

        editColor(colorId)
        {
            const token = localStorage.getItem('token');
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            axios.get(`/api/colors/edit/${colorId}`).then(response=>{
                this.colors = response.data;
               
                 this.color_name = this.colors.color_name;
                 this.color = this.colors.color;
                 this.color_id = this.colors.id;
            }).catch(error=>{

            });
        },

        clearFields() {
        this.color_name = '';
        this.color = '';
        this.color_id = '';
      
        
      },
    },
   
    
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  