<template>
  <Card class="flex flex-col items-center justify-center">
    <div class="flex w-full justify-between py-4">
      <Loader
          v-if="statBlocks === null"
          class="mx-auto py-6 text-gray-300"
          width="60"
      />
      <template v-else>
        <template v-for="statBlock in statBlocks">
          <StatBox
              :title="statBlock.title"
              :mainStat="statBlock.mainStat"
              :diff="statBlock.diff"
              :up="statBlock.up"
          />
        </template>
      </template>
    </div>
    <div class="flex w-full items-center justify-between px-3 py-3">
      <div>
        <div v-if="timePeriod !== null">
          <div class="relative flex" :class="$attrs.class">
            <select
                v-model="timePeriod"
                class="form-control form-select block w-full"
                @change="updateStats"
                :class="[
                                'form-control-xs form-select-bordered',
                                selectClasses,
                            ]"
            >
              <option value="7">7 Days</option>
              <option value="30">30 Days</option>
              <option value="60">60 Days</option>
              <option value="90">90 Days</option>
            </select>
            <IconArrow
                class="form-select-arrow pointer-events-none"
            />
          </div>
        </div>
        <Loader v-else class="text-gray-300" width="30"/>
      </div>
      <div>
        <a v-if="timePeriod !== null" href="#" @click.prevent="refreshData"
        >Refresh Data</a
        >
        <Loader v-else class="text-gray-300" width="30"/>
      </div>
      <div>
        <a v-if="fathomLink !== null" :href="fathomLink"
        >Go to Fathom</a
        >
        <Loader v-else class="text-gray-300" width="30"/>
      </div>
    </div>
  </Card>
</template>

<script setup>
import StatBox from "./StatBox.vue";
import {computed, onMounted, ref} from "vue";

const props = defineProps({
  card: {},
});

const siteId = ref(card.entityId);
const timePeriod = ref(null);

const statBlocks = ref(null);

onMounted(function () {

  Nova.request()
      .get("/nova-vendor/fathom-stats-display/getStats/" + siteId.value)
      .then((response) => {
        statBlocks.value = response.data.statBlocks;
        timePeriod.value = response.data.timePeriod;
      });
});

function updateStats() {
  Nova.request()
      .get("/nova-vendor/fathom-stats-display/getStats/" + siteId.value + "/" + timePeriod.value)
      .then((response) => {
        statBlocks.value = response.data.statBlocks;
        timePeriod.value = response.data.timePeriod;
      });
}

function refreshData() {
  Nova.request()
      .get("/nova-vendor/fathom-stats-display/refresh")
      .then((response) => {
        updateStats();
      });
}

const fathomLink = computed(function () {
  if (siteId.value == null) {
    return null;
  }
  return "https://app.usefathom.com/?site=" + siteId.value;
});
</script>
