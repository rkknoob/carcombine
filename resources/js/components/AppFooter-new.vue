<template>
  <v-footer color="blue darken-4" padless>
    <v-row justify="center" no-gutters>
      <v-btn v-for="link in links" :key="link" color="white" text rounded class="my-2">{{ link }}</v-btn>
      <v-col class="blue darken-3 py-4 text-center white--text" cols="12">
        {{ new Date().getFullYear() }} —
        <strong>Car Combine</strong>
      </v-col>
    </v-row>
  </v-footer>
</template>

<script>
export default {
  data: () => ({
    links: ["Facebook", "Contact"]
  })
};
</script>

<style>
</style>
