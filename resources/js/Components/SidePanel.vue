<script setup>
import { useStore } from "@/store.js";
import Pill from "@/Components/Pill.vue";
import Statistic from "@/Components/Statistic.vue";
import Lang from "@/Components/Language.vue";
import CachedTimes from "@/Components/CachedTimes.vue";

let store = useStore();
</script>

<template>
  <div class="text-light-shade">
    <div>
      <span class="font-bold">Description</span>
      <div>{{ store.info.description }}</div>
    </div>
    <div class="my-6 font-bold" v-if="store.info.homepage">
      <i class="fa-solid fa-link mr-2"></i>
      <a :href="store.info.homepage" class="text-blue-500">{{
        store.info.homepage
      }}</a>
    </div>
    <div class="span w-full">
      <Pill v-for="topic in store.info.topics">
        {{ topic }}
      </Pill>
    </div>
    <div class="my-6 flex lg:block">
      <Statistic
        icon="fa-solid fa-star"
        index="stargazers_count"
        text="stars" />
      <Statistic icon="fa-solid fa-eye" index="watchers" />
      <Statistic icon="fa-solid fa-code-branch" index="forks" />
    </div>
    <hr class="border-dark-accent/60" />
    <Lang class="my-6" />
    <hr class="border-dark-accent/60" />
    <CachedTimes class="my-6" />
  </div>
</template>
