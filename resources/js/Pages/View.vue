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
        <div class="grid grid-cols-1 gap-2 grid-flow-dense lg:grid-cols-4">
          <div class="col-span-3">
            <div class="text-light-shade relative mt-0 lg:mt-2">
              <h1 class="text-3xl py-4 inline-block lg:px-2">
                {{ store.project }}
              </h1>
              <div class="absolute right-0 bottom-5 right-0 lg:right-3">
                <a
                  :href="store.info.html_url"
                  class="bg-dark-accent p-2 border-2 rounded-l border-dark-accent text-sm shadow-lg">
                  <i class="fa-brands fa-github fa-xl mr-1"></i>
                  view on github
                </a>
                <a
                  :href="`https://github.com/member87/${props.project}/archive/refs/heads/main.zip`"
                  class="border-2 border-dark-accent p-2 text-sm rounded-r">
                  <i class="fa-brands fa-download fa-xl mr-1"></i>
                  Download
                </a>
              </div>
            </div>

            <ReadMe />
          </div>
          <SidePanel class="row-start-1 lg:row-auto mt-6" />
        </div>
      </div>
    </div>
  </Layout>
</template>
