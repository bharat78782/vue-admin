<template>
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form @submit.prevent="login" novalidate>
        <div class="input-group mb-3">
          <input type="email" class="form-control"  v-model="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" v-model="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        
          <!-- /.col -->
          <div class="col-12">
            <button type="submit"  @click="login"  class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

    
      <p class="mb-0">
        <a href="#!"  @click="goToRegister"  class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

</body>
</html>
  </template>
  
  <script>
    import axios from 'axios';

  export default {
    data() {
      return {
        email: '',
        password: '',
        message: '', // Store the success/error message
        success: false,
      };
    },
    methods: {
      login() {
            const userData = {
            email: this.email,
            password: this.password,
            };

            axios.post('/api/login', userData)
            .then(response => {
                // Handle the successful registration
                this.showMessage('Login successful!', true);
                
                  const { token, data } = response.data;
                    localStorage.setItem('token', token); 
                    localStorage.setItem('userData', JSON.stringify(data)); 
              this.$router.push('/dashboard');
              
            })
            .catch(error => {
                // Handle the registration error
                // this.showMessage('Registration failed. Please try again.', false);
                if (error.response && error.response.data && error.response.data.errors) {
                    // If the server returns validation errors
                    this.formErrors = error.response.data.errors;
                } else if (error.response && error.response.data && error.response.data.message) {
                    // If the server returns a custom error message
                    this.showMessage(error.response.data.message, false);
                } else {
                    this.showMessage('Registration failed. Please try again.', false);
                }
            });
      },
                showMessage(message, success) {
                this.message = message;
                this.success = success;
                // Clear the message after a certain duration if desired
                setTimeout(() => {
                    this.message = '';
                    this.success = false;
                }, 5000); // Clear message after 5 seconds
                },
                goToRegister() {
                this.$router.push('/register'); // Navigate to the register page
                },
    },
  };
  </script>
  