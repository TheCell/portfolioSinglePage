<template>
    <div class="projectview">
        <div class="upperPart">
            <div class="mainImageContainer" :id="_uid" :style="{ 'background-image': backgroundImage }">
                <!-- {{ allInformations.Mainimage }} -->
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
                <div class="smallImageContainer" :style="{ 'background-image': imageone }">
                </div>
            </div>
            <div class="media">
                <div class="smallImageContainer" :style="{ 'background-image': imagetwo }">
                </div>
            </div>
            <div class="media">
                <div class="smallImageContainer" :style="{ 'background-image': imagethree }">
                </div>
                <!-- <video width="320" height="240" controls>
                    <source :src="videourl" type="video/mp4">
                    Your browser does not support the video tag.
                </video> -->
            </div>
            <div class="media additionalInfo">
                <div v-for="(item, index) in allInformations['Additional Information']" :key="index">
                    <span>
                        {{ index }}:
                    </span>
                    <span>
                        <a :href="item">{{ item }}</a>
                    </span>
                </div>
            </div>
            <div class="challanges">
                <div class="challangelist">
                    <span class="minititle">My responsibilities</span>
                    <span class="challangeEntry" v-for="(challange, index) in allInformations['Challanges']" :key="`${index}`">
                        {{ challange }}
                    </span>
                </div>
                <div class="Responsibilitieslist">
                    <span class="minititle">Challanges</span>
                    <span class="challangeEntry" v-for="(respo, index) in allInformations['Responsibilities']" :key="`${index}`">
                        {{ respo }}
                    </span>
                </div>
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
    data: function () {
        return {
            backgroundImage: '',
            videourl: '',
            imageone: '',
            imagetwo: '',
            imagethree: ''
        }
    },
    watch: {
        allInformations: function (oldval, newval) {
            this.backgroundImage = 'url("' + this.allInformations.Mainimage + '")'
            this.imageone = 'url("' + this.allInformations.images[0] + '")'
            this.imagetwo = 'url("' + this.allInformations.images[1] + '")'
            this.imagethree = 'url("' + this.allInformations.images[2] + '")'
            this.videourl = '"' + this.allInformations.videourl + '"'
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
