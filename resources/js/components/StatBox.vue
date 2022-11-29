<template>
    <div class="flex w-full flex-col items-center justify-between px-3 py-3">
        <div class="text-4xl font-semibold">{{ props.mainStat }}</div>
        <div class="text-sm uppercase">
            {{ props.title }}
            <span :class="[up ? 'text-green-500' : 'text-red-500']">
                <template v-if="props.up">+</template>
                <template v-else>-</template>
                {{ diff }}
            </span>
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    mainStat: {
        required: true,
    },
    title: {
        required: true,
    },
    diff: {
        required: true,
    },
    up: {
        type: Boolean,
    },
});
</script>
