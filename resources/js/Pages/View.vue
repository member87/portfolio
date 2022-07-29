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
        <div class="text-light-shade">
          <h1 class="text-3xl py-5 inline-block lg:px-2">
            {{ store.project }}
          </h1>
          <a
            :href="store.info.html_url"
            class="bg-dark-accent p-2 rounded-full text-xs mx-2 shadow-lg">
            <i class="fa-brands fa-github fa-xl mr-1"></i>
            view on github
          </a>
        </div>
        <div class="grid grid-cols-1 gap-2 grid-flow-dense lg:grid-cols-4">
          <ReadMe class="col-span-3" />
          <SidePanel class="row-start-1 lg:row-auto" />
        </div>
      </div>
    </div>
  </Layout>
</template>
