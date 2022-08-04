<script setup>
import { defineProps } from "vue";
import Layout from "@/Layouts/Layout.vue";
import ProjectInfoBox from "@/Components/ProjectInfoBox.vue";
import ReadMe from "@/Components/ReadMe.vue";

let props = defineProps({
  projects: Object,
});
</script>

<template>
  <Layout>
    <div class="w-full p-4 lg:w-3/4 lg:mx-auto">
      <h1
        class="text-md py-4 flex-auto inline-block mr-3 sm:text-lg md:text-xl lg:px-2">
        <a href="/" class="text-blue-500">member87</a>
        <span class="text-gray-500"> / </span>
        <span class="font-bold text-light-shade">member87</span>
      </h1>
      <ReadMe project="member87" />
      <h2 class="mt-12 text-xl text-light-shade font-bold">Github Projects</h2>
      <hr class="my-2 border-dark-accent/50" />
      <div
        class="grid grid-cols-1 gap-8 text-light-shade py-6 lg:grid-cols-2 xl:grid-cols-3">
        <div v-for="project in projects">
          <ProjectInfoBox :project="project" />
        </div>
      </div>
    </div>
  </Layout>
</template>
