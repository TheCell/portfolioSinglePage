<template>
  <div id="app">
    <ProjectView msg="Welcome to Your Vue.js App"/>
    <NavigationView />
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
        portfoliodata: ''
      }
    },
    mounted () {
        console.log('I was called in mounted')
        this.getajaxContent(0)
    },
    methods: {
       getajaxContent (params) {
        var xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function () {
          if (this.readyState === 4 && this.status === 200) {
              this.portfoliodata = JSON.parse(xhttp.responseText)
              console.log(this.portfoliodata)
          }
        }
        xhttp.open('GET', 'http://localhost/portfolioSinglePage/portfolio/public/portfoliodata.php', true)
        xhttp.send()

        // fetch('http://localhost/portfolioSinglePage/portfolio/public/portfoliodata.php', {
        //     method: 'GET',
        //     dataType: 'json',
        //     // mode: 'no-cors',
        //     headers: {
        //       Accept: 'application/json'
        //     }
        //   })
        //   .then(response => {
        //     console.log(response)
        //     response.json()
        //   })
        //   .then(data => {
        //     console.log(data)
        //   })
        //   .catch(error => {
        //     console.log('request failed', error)
        //   })
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
