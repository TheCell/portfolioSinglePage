<template>
    <div id="navigation">
      <div v-for="(item, index) in projectnames" :key="index"
        @click="$emit('changeProject', 1)">

        {{ item[0] }}
      </div>
    </div>
</template>

<script>
export default
{
  name: 'NavigationView',
  props: {
    projectnames: {
      type: Array
    }
  },
  data: function () {
    // console.log('projectnames data:', this.projectnames)
    return {}
  },
  mounted () {
    // console.log(this.projectnames)
  },
  created: function () {
    // console.log('projectnames created:', this.projectnames)
  },
  watch: {
    projectnames: function (oldval, newval) {
      // console.log(oldval, newval)
    }
  }
}
</script>

<style>

</style>
