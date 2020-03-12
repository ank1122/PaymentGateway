<template>
    <div>
        <div v-html= "htmlData">
            {{htmlData}}
        </div>
    </div>
</template>

<script>
// import { bus } from '../main';
export default {
    name: 'returnDetails',
    props:['htmlData'],
    data(){
    this.htmlData
    }
}
</script>
<style scoped>

</style>