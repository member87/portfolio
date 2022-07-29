<script setup>
import { defineProps } from "vue";
import Layout from "@/Layouts/Layout.vue";
import ProjectInfoBox from "@/Components/ProjectInfoBox.vue";

let props = defineProps({
  projects: Object,
});
</script>

<template>
  <Layout>
    <div class="w-full px-4 lg:w-3/4 lg:mx-auto">
      <div
        class="grid grid-cols-1 gap-8 text-light-shade py-6 lg:grid-cols-2 xl:grid-cols-3">
        <div v-for="project in projects">
          <ProjectInfoBox :project="project" />
        </div>
      </div>
    </div>
  </Layout>
</template>
