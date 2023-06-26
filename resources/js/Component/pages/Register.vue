<template>
    
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <div v-if="success" class="alert alert-success">
        {{ message }}
        </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form @submit.prevent="register" novalidate>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="name" v-model="name" placeholder="Enter name" required :class="{ 'is-invalid': formErrors.name }">
            

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <div class="invalid-feedback" v-if="formErrors.name">
            {{ formErrors.name }}
          </div>
        </div>
        <div class="input-group mb-3">
         <input type="email" class="form-control" id="email" v-model="email" placeholder="Enter email" required :class="{ 'is-invalid': formErrors.email }">
        

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <div class="invalid-feedback" v-if="formErrors.email">
            {{ formErrors.email }}
          </div>

        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" v-model="password" placeholder="Password" required :class="{ 'is-invalid': formErrors.password }">
        
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="invalid-feedback" v-if="formErrors.password">
            {{ formErrors.password }}
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="confirmPassword" v-model="confirmPassword" placeholder="Confirm Password" required :class="{ 'is-invalid': formErrors.confirmPassword }">
        

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>


          <div class="invalid-feedback" v-if="formErrors.confirmPassword">
            {{ formErrors.confirmPassword }}
          </div>
          
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

      <a href="#1"   @click="goToLogin" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

</body>
</html>
  </template>
  
  <script>
  import axios from 'axios';
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      confirmPassword: '',
      formErrors: {},
      message: '', // Store the success/error message
      success: false,
    };
  },
  methods: {
    register() {
       
      if (this.password !== this.confirmPassword) {
        this.showMessage("Password confirmation doesn't match", false);
        return;
      }

      const userData = {
      name: this.name,
      email: this.email,
      password: this.password,
    };

    axios.post('/api/register', userData)
      .then(response => {
        // Handle the successful registration
        this.showMessage('Registration successful!', true);
        this.clearFields();
        // Redirect to the dashboard or login page
        // this.$router.push('/dashboard'); 
        // Replace '/dashboard' with the appropriate URL

        // Optionally, you can store the user token or perform additional actions
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
    goToLogin() {
      this.$router.push('/login'); // Navigate to the login page
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
    clearFields() {
        this.name = '';
        this.email = '';
        this.password = '';
        this.confirmPassword = '';
      },

  },
};


</script>

<style>
  .is-invalid {
    border-color: red;
  }

  .invalid-feedback {
    color: red;
    font-size: 14px;
    margin-top: 5px;
  }
</style>
  