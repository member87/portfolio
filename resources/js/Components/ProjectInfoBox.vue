<script setup>
import { defineProps, ref } from "vue";
import Pill from "@/Components/Pill.vue";
import Language from "@/Components/Language.vue";

let props = defineProps({
  project: String,
});

let info = ref({});

(async () => {
  let resp = await axios.get(route("getInfo", props.project));
  console.log(resp.data);
  info.value = resp.data;
})();
</script>

<template>
  <div class="bg-slate-800/40 rounded overflow-hidden shadow h-full">
    <h2 class="font-bold text-2xl bg-zinc-100/10 py-2 px-6 relative">
      {{ project }}
      <a :href="info.html_url">
        <span
          class="text-sm bg-dark-shade px-2 py-1 rounded-full absolute right-2 top-2 m-1">
          <i class="fa-brands fa-github mr-1"></i>
          github
        </span>
      </a>
    </h2>
    <a :href="route('view', project)">
      <div class="p-6">
        <div class="text-light-shade/60">{{ info.description }}</div>
        <div class="span w-full my-2">
          <Pill v-for="topic in info.topics">
            {{ topic }}
          </Pill>
        </div>
        <Language :project="project" />
      </div>
    </a>
  </div>
</template>
