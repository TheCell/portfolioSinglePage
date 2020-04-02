<template>
    <div class="projectview">
        <div class="upperPart">
            <div class="mainImageContainer">
                Im an image
            </div>
            <div class="titleContainer">
                <span class="projecttitle">{{ allInformations.Information.title }}</span>
                <span class="subtitle">{{ allInformations.Information.year }}</span>
                <span class="subtitle">{{ allInformations.Information.scope }}</span>
                <span class="subtitle">{{ allInformations.Information.link }}</span>
            </div>
            <div class="descriptionContainer">
                {{ allInformations.Description }}
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
        allInformations: Object
    },
    watch: {
        allInformations: function (oldval, newval) {
            console.log(newval)
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
