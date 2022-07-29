<script setup>
import { marked } from "marked";
import axios from "axios";
import { useStore } from "@/store.js";
import { ref } from "vue";
let store = useStore();

let markdown = ref("");
(async () => {
  let resp = await axios.get(route("getReadme", store.project));
  markdown.value = marked(resp.data);
})();
</script>

<template>
  <div
    class="mr-3 prose prose-sm max-w-full border border-dark-accent/60 rounded shadow p-10 prose-invert md:prose-base">
    <span v-html="markdown"></span>
  </div>
</template>
