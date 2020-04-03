<template>
    <div id="navigation">
        <div v-for="(item, index) in navigationData"
          :key="index" ref="items"
          @click="$emit('changeProject', index)"
          v-bind:class="{ 'isactive': index === currentActive }">
          {{ item }}
        </div>
    </div>
</template>

<script>
export default
{
  name: 'NavigationView',
  props: {
    currentActive: Number,
    navigationData: {
      type: Array
    }
  },
  data: function () {
    // console.log('navigationData data:', this.navigationData)
    return {
      navigationContainer: '',
      keepanimating: false,
      mousepos: { x: 0, y: 0 },
      naviElements: []
    }
  },
  mounted () {
    this.navigationContainer = document.getElementById('navigation')
    this.navigationContainer.onmouseenter = this.mouseEnterHandler
    this.navigationContainer.onmousemove = this.mouseMoveHandler
    this.navigationContainer.onmouseleave = this.mouseExitHandler
  },
  updated () {
    this.naviElements = this.$refs.items
  },
  methods: {
    animateTextSize (params) {
      var vuethis = this
      var tempElements = this.$refs.items
      if (this.keepanimating) {
        for (let i = 0; i < tempElements.length; i++) {
          var rect = tempElements[i].getBoundingClientRect()
          tempElements[i].style.fontSize = vuethis.getSizeFromDistance({ x: rect.x, y: rect.y }, 100, 130) + '%'
        }
      }
    },
    mouseEnterHandler (event) {
      this.keepanimating = true
    },
    mouseMoveHandler (event) {
      this.mousepos.x = event.x
      this.mousepos.y = event.y
      this.animateTextSize()
    },
    mouseExitHandler (event) {
      this.mousepos.x = 0
      this.mousepos.y = 0
      this.animateTextSize()
      this.keepanimating = false
    },
    getSizeFromDistance (elementAbsolutepos, minfont, maxfont) {
      if (this.mousepos.y < elementAbsolutepos.y - 40) {
        return minfont
      } else if (this.mousepos.y > elementAbsolutepos.y + 40) {
        return minfont
      } else {
        var t = (1 / 40) * Math.abs(this.mousepos.y - elementAbsolutepos.y)
        return this.lerp(maxfont, minfont, t)
      }
    },
    lerp (val1, val2, t) {
      return (1 - t) * val1 + val2 * t
    }
  },
  created: function () {
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
