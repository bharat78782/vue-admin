<template>
  <!-- <h4>Test</h4> -->
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',
  mounted() {
      this.redirectLogin();
    },

  methods: {
    redirectLogin() {
      this.$router.push('/login'); // Navigate to the register page
      },
  },
};
</script>
