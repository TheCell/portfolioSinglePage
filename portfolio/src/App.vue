<template>
  <div id="app">
    <ProjectView msg="Welcome to Your Vue.js App"/>
    <NavigationView :navigationData="navigationData"
      v-on:changeProject="onChangeProject" />
      <!-- {{ currentProject }} -->
  </div>
</template>

<script>
/* eslint-disable indent */
import ProjectView from './components/ProjectView.vue'
import NavigationView from './components/NavigationView.vue'
import axios from 'axios'

export default
{
    name: 'App',
    components: {
        ProjectView,
        NavigationView
    },
    data: function () {
      return {
        allData: {},
        navigationData: [],
        projectData: {},
        currentProject: 0,
        weburl: 'http://localhost:8080/portfolioSinglePage/portfolio/public/'
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
              vuethis.allData = JSON.parse(xhttp.responseText)
              var tempData = []
              tempData = Object.entries(vuethis.allData)
              vuethis.navigationData = []
              for (let i = 0; i < tempData.length; i++) {
                vuethis.navigationData.push(tempData[i][0])
              }

              vuethis.changeProjectData(0)
          }
        }

        xhttp.open('GET', this.weburl + 'portfoliodata.php', true)
        xhttp.send()
      },
      changeProjectData (projectnr) {
        console.log('changing to :' + projectnr)
        var newdata = Object.entries(this.allData)[projectnr]
        // projectData.newdata = newdata
        const items = newdata[1]
        const matches = items.filter(s => s.includes('.json'))
        // console.log(this.weburl + matches[0])
        axios.get(this.weburl + matches[0])
          .then(function (response) {
            var infos = response.data
            console.log(infos.Information)
          })
          .catch(function (error) {
            // handle error
            console.error(error)
          })
          .finally(function () {
            // always executed
          })
        // var xhttp = new XMLHttpRequest()
        // var vuethis = this
        // xhttp.onreadystatechange = function () {
        //   if (this.readyState === 4 && this.status === 200) {
        //       vuethis.projectData = {}
        //       vuethis.projectData.infos = JSON.parse(xhttp.responseText)
        //       vuethis.currentProject = projectnr
        //   }
        // }
        // xhttp.open('GET', vuethis.weburl + matches[0], true)
        // xhttp.send()
      },
      onChangeProject (params) {
        // console.log('I should change project', params)
        this.changeProjectData(params)
      }
    }
}
</script>

<style lang="scss">
@import "./assets/style.scss";
@import "./assets/reset.css";
</style>
