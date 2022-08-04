<script setup>
import { marked } from "marked";
import axios from "axios";
import { useStore } from "@/store.js";
import { ref, defineProps } from "vue";
let store = useStore();

let props = defineProps({
  project: String,
});

let markdown = ref("");
(async () => {
  let resp = await axios.get(
    route("getReadme", props.project ? props.project : store.project)
  );
  markdown.value = marked(resp.data);
})();
</script>

<template>
  <div
    class="prose p-0 prose-sm max-w-full border-0 border-dark-accent/60 rounded shadow prose-invert sm:border sm:p-5 md:prose-base md:p-10">
    <span v-html="markdown"></span>
  </div>
</template>
