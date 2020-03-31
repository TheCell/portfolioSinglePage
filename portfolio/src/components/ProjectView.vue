<template>
    <div class="projectview">
        <div class="upperPart">
            <div class="mainImageContainer">
                Im an image
            </div>
            <div class="titleContainer">
                here is a title
            </div>
            <div class="descriptionContainer">
                {{ msg }}
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            </div>
        </div>
        <div class="lowerPart">
            <div class="media">
                here will be an image
            </div>
            <div class="media">
                here will be an image
            </div>
            <div class="media">
                here will be an image or video
            </div>
            <div class="media additionalInfo">
                Additional information
            </div>
            <div class="challanges">
                I'm challanges and responsibility
            </div>
        </div>
    </div>
</template>

<script>
/* eslint-disable indent */
export default
{
    name: 'ProjectView',
    props:
    {
        msg: String
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
