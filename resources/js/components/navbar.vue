<template>
    <v-app  >
        <div>
       <v-app-bar
      color="gray-lighten-2 accent-4"
      dark
    >
      <v-toolbar-title>{{ title }}</v-toolbar-title>

      <v-spacer></v-spacer>

    </v-app-bar>
        </div>
    </v-app>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
             },
        },
    }
</script>

<style lang="css" >
    .v-application--wrap{
        max-height: 60px;
        min-height: 0px;
    }
</style>
