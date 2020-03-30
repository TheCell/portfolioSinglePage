<template>
    <div class="projectview">
        <div class="gridsystem">
            <div class="titleContainer">
                here is a title
            </div>
            <div class="mainImageContainer">
                Im an image
            </div>
            <div class="descriptionContainer">
                {{ msg }}
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
