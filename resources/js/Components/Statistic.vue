<script setup>
import { defineProps } from "vue";
import { useStore } from "@/store.js";

const store = useStore();
let props = defineProps({
  icon: String,
  index: String,
  text: String,
});
</script>

<template>
  <div class="text-gray-400 text-sm mb-1">
    <i :class="icon + ' w-4'"></i>
    <span class="ml-2">{{ store.info[index] }}</span>
    {{ text ? text : index }}
  </div>
</template>
