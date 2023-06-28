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
              <form id="quickForm">
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
                    <select name="color_id" id="color_id" v-model="color_id" class="form-control">
                        <option disabled selected>Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="size_id">Size</label>
                    <select name="size_id" id="size_id" v-model="size_id" class="form-control  select2" multiple>
                        <option disabled selected>Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                  </div>
                  

                  <div class="form-group">
                    <label for="product_short_desc">Product Short description</label>
                   <textarea name="product_short_desc" id="product_short_desc"  cols="5" rows="3" class="form-control"></textarea>
                  </div>


                  <div class="form-group">
                    <label for="product_long_desc">Product Long description</label>
                   <textarea name="product_long_desc" id="product_long_desc"  cols="5" rows="6" class="form-control"></textarea>
                  </div>



        

                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" @change="handleProductImageChange">

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

    // import  'admin-lte/plugins/jquery/jquery.js';
    import $ from 'admin-lte/plugins/jquery/jquery.js';
    window.$ = window.jQuery = $;
    import 'admin-lte/plugins/select2/css/select2.css';
    import 'admin-lte/plugins/select2/js/select2.js';
    import 'admin-lte/plugins/select2/js/select2.full.js';
    
    // window.jQuery = $;
    // window.$ = $;
    export default {
    name: 'addProduct',
        components: {
        Sidebar,
        Navbar,
        Footers,
    
    },
    data() {
    return {
      country: '',
      phone_number: '',
      profileImage: null,
      profileImageUrl: '',
    };
    },
    
    
    mounted() {
    //   $('#size_id').select2();

    //   $(this.$refs.selectElement).select2();
    },
    methods: {
    
    },
    };
 </script>
 <style scoped>
    /* Add component-specific styles here */
 </style>