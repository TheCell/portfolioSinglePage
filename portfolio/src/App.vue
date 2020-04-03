<template>
  <div id="app">
    <ProjectView :allInformations="projectData" />
    <NavigationView :navigationData="navigationData"
      v-on:changeProject="onChangeProject" :currentActive="currentProject" />
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
        projectData: { Mainimage: '', images: [], video: '', Information: { title: '', year: '', scope: '', link: '' }, Description: '', 'Additional Information': [{ '': '' }], Challanges: [''], Responsibilities: [''], Technology: [''] },
        currentProject: 0,
        weburl: 'http://localhost:8080/portfolioSinglePage/portfolio/public/'
      }
    },
    mounted () {
        this.getajaxContent(0)
    },
    methods: {
       getajaxContent (params) {
        var vuethis = this
        axios.get(this.weburl + 'portfoliodata.php')
          .then(function (response) {
            vuethis.allData = response.data

            var tempData = []
              tempData = Object.entries(vuethis.allData)
              vuethis.navigationData = []
              for (let i = 0; i < tempData.length; i++) {
                vuethis.navigationData.push(tempData[i][0])
              }

              vuethis.changeProjectData(0)
          })
          .catch(function (error) {
            // handle error
            console.error(error)
          })
          .finally(function () {
            // always executed
          })
      },
      changeProjectData (projectnr) {
        // console.log('changing to ', projectnr)
        var newdata = Object.entries(this.allData)[projectnr]
        // console.log(Object.entries(this.allData))
        const items = newdata[1]
        const matches = items.filter(s => s.includes('.json'))
        // console.log(matches)

        var vuethis = this
        // console.log(this.weburl + matches[0])
        axios.get(this.weburl + matches[0])
          .then(function (response) {
            vuethis.projectData = response.data
            vuethis.projectData.Mainimage = vuethis.weburl + items.filter(s => s.includes('main.'))[0]
            vuethis.projectData.images = []
            var temparr = []
            temparr = [].concat(temparr, items.filter(s => s.includes('.png')))
            temparr = [].concat(temparr, items.filter(s => s.includes('.PNG')))
            temparr = [].concat(temparr, items.filter(s => s.includes('.jpg')))
            temparr = [].concat(temparr, items.filter(s => s.includes('.JPG')))
            temparr = [].concat(temparr, items.filter(s => s.includes('.jpeg')))
            temparr = [].concat(temparr, items.filter(s => s.includes('.JPEG')))
            temparr = temparr.filter(s => !s.includes('main'))
            for (let i = 0; i < temparr.length; i++) {
              temparr[i] = vuethis.weburl + temparr[i]
            }
            vuethis.projectData.images = temparr

            vuethis.projectData.video = ''
            temparr = []
            temparr = [].concat(temparr, items.filter(s => s.includes('.mp4')))
            temparr = [].concat(temparr, items.filter(s => s.includes('.MP4')))
            if (temparr.length > 0) {
              vuethis.projectData.video = vuethis.weburl + temparr[0]
            }
            vuethis.currentProject = projectnr
          })
          .catch(function (error) {
            // handle error
            console.error(error)
          })
          .finally(function () {
            // always executed
          })
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
