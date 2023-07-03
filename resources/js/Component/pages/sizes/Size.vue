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
                <h1>Add Size</h1>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"  @click="modalVisible = true">
                         Add Size
                        </button>
                        <br>
                        <br>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Size Small</th>
                                    <th>Size Large</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                    <tr v-for="size in sizes" :key="size.id">
                                    <td>{{ size.size_name_one }}</td>
                                    <td>{{ size.size_name_two }}</td>
                                    <td>active</td>
                                    <td>
                                        <a href="#!"  @click="deleteSize(size.id)" >Delete</a> &nbsp;
                                        <a href="" @click.prevent="editSize(size.id)">edit</a>
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

    <div class="modal fade" id="modal-default"   :class="{ 'show': modalVisible }" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
             
            </div>
            <div class="modal-body">
                <form  @submit.prevent="addSize()">
                            <div class="form-group">
                                <label for="inputName">Size 1</label>
                                <select name="" id="" v-model="size_name_one" :class="{ 'is-invalid': formErrors.size_name_one }"  class="form-control">
                                    <option disabled selected>Select</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <input type="hidden" v-model="size_id" id="size_id">

                                <div class="invalid-feedback" v-if="formErrors.size_name_one">
                                    {{ formErrors.size_name_one }}
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputName">Size 2</label>
                                <select name="" id="" v-model="size_name_two" :class="{ 'is-invalid': formErrors.size_name_two }"  class="form-control">
                                    <option disabled selected>Select</option>
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                    <option value="Xtra-Large">Xtra-Large</option>
                                </select>

                                <div class="invalid-feedback" v-if="formErrors.size_name_two">
                                    {{ formErrors.size_name_two }}
                                </div>
                            </div>
                            
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal" @click="modalVisible = false">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                        </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
        size_id : '',
        size_name_one : '',
        size_name_two : '',
        sizes: null,
        formErrors:{},
        modalVisible: false,
     };
  },


  mounted(){
    this.viewSize();
  },
   
    methods: {
        
       addSize(){
        const addData = {
            size_name_one:this.size_name_one,
            size_name_two:this.size_name_two,
        };
        const token = localStorage.getItem('token');
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

        if(this.size_id)
        {
           axios.patch(`/api/sizes/update/${this.size_id}`,addData).then(response=>{
                this.clearFields();
                this.viewSize();
             if(response.data.success == true){
                toastr.success(response.data.message,false);
                }
                else{
                    toastr.error(response.data.message,false);
                }
           }).catch(error=>{
            toastr.error(error.response,false);
           }).finally(() => {
                this.modalVisible = false; // Hide the modal
            });

        }else{
            axios.post('/api/sizes/store',addData).then(response=>{
                this.clearFields();
                this.viewSize();
                if(response.data.success == true){

                
                toastr.success(response.data.message,false);
                //  this.modalVisible = true;
                }
                else{
                    toastr.error(response.data.message,false);
                }
                
            }).catch(error=>{
               toastr.error(error.response.data.message, false);
            }).finally(() => {
                this.modalVisible = false; // Hide the modal
            });
        }
      
    },

    viewSize(){
        const token = localStorage.getItem('token');
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        axios.get('/api/sizes/index').then(response=>{
             console.log(response.data.data);
             this.sizes =  response.data.data;
        }).catch(error=>{
            toastr.error(error.response,false);
        });
    },
    deleteSize(colorId){

        const confirmed = window.confirm('Are you sure you want to delete this size?');
        if (!confirmed) {
            return; 
            }

        const token = localStorage.getItem('token');
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        axios.delete(`/api/sizes/destroy/${colorId}`).then(response=>{
            this.viewSize();
            toastr.success(response.data.message,false);
        }).catch(error=>{
            toastr.error(error.response,false);
        });
    },
    editSize(colorId){
       
        const token = localStorage.getItem('token');
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        axios.get(`/api/sizes/edit/${colorId}`)
        
        .then(response=>{
            console.log(response.data)
          
            
            this.sizess = response.data;
            this.size_name_one =  this.sizess.size_name_one;
            this.size_name_two =  this.sizess.size_name_two;
            this.size_id =  this.sizess.id;
            this.modalVisible = true; 
           
           
        }).catch(error=>{
            toastr.error(error,false);
        });
    },
   
    clearFields()
    {
        this.size_name_one = '';
        this.size_name_two = '';
        this.size_id = '';
    }   
       
    },
   
    
  };
  </script>
  
    <style scoped>
    .modal {
    display: none;
    background-color: rgba(0, 0, 0, 0.5);
    }

    .modal.show {
    display: block;
    }
  </style>
  