<template>
  <div id="app">
   <HelloWorld msg="Welcome to Your Vue.js App"/>
    <!-- <HelloWorld @data="htmlData=$event" v-bind:htmlData="htmlData"/> -->
    <returnDetails  v-bind:htmlData="htmlData"/>

  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'

// eslint-disable-next-line no-unused-vars
import returnDetails from './components/returnDetails.vue'
export default {
  name: 'App',
  data(){
    return{
      response:[],
      // eslint-disable-next-line no-undef
      htmlData
    }
  },
  
  components: {
    HelloWorld,
    returnDetails
  },
}
</script>

<style>

</style>
