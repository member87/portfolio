<script setup>
import ReadMe from "@/Components/ReadMe.vue";
import SidePanel from "@/Components/SidePanel.vue";
import Layout from "@/Layouts/Layout.vue";
import { useStore } from "@/store.js";

const store = useStore();

let props = defineProps({
  project: String,
});

store.project = props.project;

(async () => {
  let resp = await axios.get(route("getInfo", props.project));
  store.info = resp.data;
})();
</script>

<template>
  <Layout>
    <div class="p-6">
      <div class="w-full md:w-5/6 lg:w-3/4 mx-auto">
        <div
          class="grid grid-cols-1 gap-0 lg:gap-6 lg:grid-cols-[minmax(0,1fr)_280px]">
          <div
            class="text-light-shade flex flex-col mt-0 break-all sm:flex-row lg:mt-2">
            <h1
              class="text-md py-4 flex-auto inline-block mr-3 md:text-xl lg:px-2">
              <a href="/" class="text-blue-500">member87</a> /
              <span class="font-bold">{{ store.project }}</span>
            </h1>
            <div class="shrink-0 sm:mt-5">
              <a
                :href="store.info.html_url"
                class="bg-dark-accent min-w-full p-2 border-2 rounded-l border-dark-accent text-xs shadow-lg sm:text-sm">
                <i class="fa-brands fa-github fa-xl mr-1"></i>
                view on github
              </a>
              <a
                :href="`https://github.com/member87/${props.project}/archive/refs/heads/main.zip`"
                class="border-2 border-dark-accent p-2 text-xs rounded-r sm:text-sm">
                <i class="fa-solid fa-download fa-lg mr-1"></i>
                Download
              </a>
            </div>
          </div>
          <ReadMe class="lg:row-start-2" />
          <SidePanel
            class="row-start-2 lg:row-span-2 lg:col-start-2 lg:row-start-1 mt-6" />
        </div>
      </div>
    </div>
  </Layout>
</template>
