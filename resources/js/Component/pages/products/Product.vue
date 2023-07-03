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
                <h1>Products</h1>
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
          <div class="container-fluid">
            <div class="row">
              
                <div class="col-lg-12">
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr v-for="product in products" :key="product.id">
                      <td>{{ product.product_name }}</td>
                      <td>{{ product.product_price }}</td>
                      <td>{{ product.product_quantity }}</td>
                      <td>{{ product.product_sku }}</td>
                     
                      <td>
                        <img  :src="baseUrl + 'documents/products/' + product.product_image"  class="profile-user-img img-fluid img-circle" alt="User profile picture">
                      </td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="#" >
                          <i class="fas fa-folder"></i> View
                        </a>
                        &nbsp;
                        <a class="btn btn-danger btn-sm" href="#!" @click="deleteProduct(product.id)">
                          <i class="fas fa-trash"   ></i> Delete
                        </a>
                        &nbsp;
                        <a class="btn btn-info btn-sm" href="#"  @click="editProduct(product.id)">
                          <i class="fas fa-pencil-alt"></i> Edit
                        </a>
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
    name: 'profile',
        components: {
        Sidebar,
        Navbar,
        Footers,
    
    },
    data() {
    return {
      product_name: '',
      product_price: '',
      product_quantity: '',
      product_sku: '',
      status: '',
      productImage: '',
     
      products:null,
      baseUrl: 'http://localhost/vuejs3/vue-admin/public/'
    };
  },

   mounted(){
    const token = localStorage.getItem('token');
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    this.viewProduct();
   },

    methods: {
      viewProduct()
      {
        axios.get('/api/products/index').then(response=>{
          console.log(response.data.data);
          this.products = response.data.data;
        }).catch(error=>{
          
        });
      },
      deleteProduct(productId){
      
        const confirmed = window.confirm('Are you sure you want to delete this product?');
    
        if (!confirmed) {
          return; // If not confirmed, do nothing
        }

        const token = localStorage.getItem('token');
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        axios.delete(`/api/products/destroy/${productId}`).then(response=>{
          if(response.data.success == true){
            toastr.success(response.data.message);
            this.viewProduct()
          }else{
            toastr.error(response.data.message);
          }
        }).catch(error=>{
          toastr.error(error.response.data.message, false);
        })
      },
      editProduct(productId){
        this.$router.push({ name: 'editProduct', params: { id: productId } });
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  