<template>
  <div id="app">
    <ProjectView msg="Welcome to Your Vue.js App"/>
    <NavigationView :projectnames="portfoliodata"
      v-on:changeProject="onChangeProject" />
      <!-- {{ currentProject }} -->
  </div>
</template>

<script>
/* eslint-disable indent */
import ProjectView from './components/ProjectView.vue'
import NavigationView from './components/NavigationView.vue'

export default
{
    name: 'App',
    components: {
        ProjectView,
        NavigationView
    },
    data: function () {
      return {
        portfoliodata: [],
        currentProject: 0
      }
    },
    mounted () {
        this.getajaxContent(0)
    },
    methods: {
       getajaxContent (params) {
        var xhttp = new XMLHttpRequest()
        var vuethis = this
        xhttp.onreadystatechange = function () {
          if (this.readyState === 4 && this.status === 200) {
              vuethis.portfoliodata = Object.entries(JSON.parse(xhttp.responseText))
          }
        }

        xhttp.open('GET', 'http://localhost/portfolioSinglePage/portfolio/public/portfoliodata.php', true)
        xhttp.send()
      },

      onChangeProject (params) {
        console.log('I should change project', params)
      }
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
