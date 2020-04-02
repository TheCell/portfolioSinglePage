<template>
    <div id="navigation">
      <div v-for="(item, index) in navigationData" :key="index"
        @click="$emit('changeProject', index)">
        {{ item }}
      </div>
    </div>
</template>

<script>
export default
{
  name: 'NavigationView',
  props: {
    navigationData: {
      type: Array
    }
  },
  data: function () {
    // console.log('navigationData data:', this.navigationData)
    return {}
  },
  mounted () {
    // console.log(this.navigationData)
  },
  created: function () {
    // console.log('navigationData created:', this.navigationData)
  },
  watch: {
    navigationData: function (oldval, newval) {
      // console.log(oldval, newval)
    }
  }
}
</script>

<style>

</style>
