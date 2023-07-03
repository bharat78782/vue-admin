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
                      <h4>Create Products</h4>
                   </div>
                   <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item">
                            <router-link to="/dashboard">Home</router-link>
                         </li>
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
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div v-if="isLoading" class="loader-overlay">
                <div class="loader"></div>
              </div>
              
              <form id="quickForm" @submit.prevent="addProduct()">
                <div class="card-body">

                  <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control" v-model="product_name" id="product_name"  placeholder="Product Name">
                  </div>

                  <div class="form-group">
                    <label for="product_price">Product Name</label>
                    <input type="number" name="product_price" class="form-control" v-model="product_price" id="product_price"  placeholder="Product Price">
                  </div>

                  <div class="form-group">
                    <label for="product_quantity">Product Quantity</label>
                    <input type="number" name="product_quantity" class="form-control" v-model="product_quantity" id="product_quantity"  placeholder="Product Quantity">
                  </div>

                  <div class="form-group">
                    <label for="product_sku">Product SKU</label>
                    <input type="number" name="product_sku" class="form-control" v-model="product_sku" id="product_sku"  placeholder="Product SKU">
                  </div>

                  <div class="form-group">
                    <label for="color_id">Colors</label>
                    <select name="color_id" id="color_id" v-model="color_id" class="form-control" multiple>
                        
                       
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="size_id">Size</label>
                           <select name="size_id" id="size_id" v-model="size_id" class="form-control " multiple >
                       
                         
                
                        </select>
                       
                    </div>
                  

                  <div class="form-group">
                    <label for="product_short_desc">Product Short description</label>
                   <textarea name="product_short_desc" id="product_short_desc"  v-model="product_short_desc"   cols="5" rows="3" class="form-control"></textarea>
                  </div>


                  <div class="form-group">
                    <label for="product_long_desc">Product Long description</label>
                   <textarea name="product_long_desc" id="product_long_desc"  v-model="product_long_desc"   cols="5" rows="6" class="form-control"></textarea>
                  </div>



        

                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" @change="handleProductImageChange">
                 </div>

                 <div class="form-group">
                    <label for="exampleInputEmail1">Product Multipe Image</label>
                    <input type="file" class="form-control" @change="handleProductImageMultipeChange" multiple>
                 </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            
            </div>
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

   
    
    // window.jQuery = $;
    // window.$ = $;
    export default {
    name: 'editProduct',
        components: {
        Sidebar,
        Navbar,
        Footers,
        sizes: [], // Move the sizes declaration here
        colors: null, // Move the sizes declaration here
    
    },
    data() {
    return {
        product_name: '',
        product_price: '',
        product_quantity: '',
        product_sku: '',
        color_id: '',
        size_id: [],
        product_short_desc: '',
        product_long_desc: '',
        productImage: null,
        productMultipeImage: null,
        sizes: [], // Define as data property
        colors: null, // Define as data property
        isLoading: false,
    };
    },
    
    
  
    
    };
 </script>
 <style scoped>
    .loader-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.5);
}

.loader {
  border: 8px solid #f3f3f3;
  border-top: 8px solid #3498db;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
 </style>