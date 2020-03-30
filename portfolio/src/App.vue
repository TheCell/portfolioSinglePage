<template>
  <div id="app">
    <ProjectView msg="Welcome to Your Vue.js App"/>
    <NavigationView />
  </div>
</template>

<script>
import ProjectView from './components/ProjectView.vue'
import NavigationView from './components/NavigationView.vue'

export default {
  name: 'App',
  components: {
    ProjectView,
    NavigationView
  }
}
</script>

<style lang="scss">
#app
{
    width: 100vw;
    height: 100vh;
}

@import "./assets/style.scss";
@import "./assets/reset.css";
</style>
