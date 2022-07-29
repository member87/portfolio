<script setup>
import axios from "axios";
import { useStore } from "@/store.js";
import { ref } from "vue";

const store = useStore();
let times = ref({});

(async () => {
  let resp = await axios.get(route("getCache", store.project));
  times.value = resp.data;
})();
</script>

<template>
  <div>
    <span class="font-extrabold">
      Cache
      <span class="ml-1 text-dark-accent relative group">
        <i class="fa-solid fa-circle-info"></i>
        <div class="absolute w-44 left-0 top-4 py-2 group-hover:block hidden">
          <div
            class="bg-zinc-800 text-light-shade p-2 rounded shadow-sm text-sm">
            The cache will be reset every 12 hours
          </div>
        </div>
      </span>
    </span>
    <div v-for="(cache, key) in times" class="text-xs">
      <span class="capitalize font-bold text-sm">{{ key }}</span>
      <span class="text-gray-500 mx-2">{{ cache }} ago</span>
    </div>
  </div>
</template>
