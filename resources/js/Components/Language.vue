<script setup>
import axios from "axios";
import { useStore } from "@/store.js";
import { ref, defineProps } from "vue";

let props = defineProps({
  project: String,
});

const store = useStore();
let langs = ref("");
let total = ref(0);

(async () => {
  let resp = await axios.get(
    route("getLanguage", props.project ? props.project : store.project)
  ); //store.project));
  langs.value = resp.data;
  for (let key in langs.value) {
    total.value += langs.value[key];
  }
})();
</script>

<template>
  <div>
    <div class="mb-3 font-bold">Languages</div>
    <div
      class="h-2 w-full bg-dark-accent mb-3 rounded-full flex overflow-hidden">
      <div
        v-for="(count, lang) in langs"
        :class="`h-2 bg-${lang}`"
        :style="{ width: (count / total) * 100 + '%' }"></div>
    </div>
    <div class="flex flex-wrap">
      <div
        v-for="(count, lang) in langs"
        class="w-20 mr-2 mb-1 text-xs min-w-fit px-2 py-1">
        <div :class="`w-2 h-2 inline-block rounded-full mr-1 bg-${lang}`"></div>
        <span class="whitespace-nowrap">
          <span class="font-bold">{{ lang }}</span>
          {{ ((count / total) * 100).toFixed(1) }}%
        </span>
      </div>
    </div>
  </div>
</template>
