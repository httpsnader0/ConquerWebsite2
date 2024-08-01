<template>

	<AppHead title="Event" />

	<div class="w-full grid grid-cols-4 gap-10 px-20 mb-20">

		<PanelMenu
			:model="items"
			class="w-full"
		/>

		<div class="col-span-3 w-full bg-white p-10 flex flex-col justify-center items-center gap-5 shadow-lg rounded-2xl border border-border-light dark:border-border-dark">

			{{ event }}

		</div>

	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import PanelMenu from 'primevue/panelmenu';
	import { ref } from "vue";

    const props = defineProps({
        event: String,
    });

	const items = ref([
		{
			label: 'Server Events',
			items: [
				{
					label: 'Guild War',
				},
				{
					label: 'Elite PK',
				},
				{
					label: 'Team PK',
				},
			]
		},
		{
			label: 'Boss Monsters',
			items: [
				{
					label: 'Terato Dragon',
				},
				{
					label: 'Snow Banshee',
				},
				{
					label: 'Thrilling Spook',
				},
			]
		},
		{
			label: 'Server Quests',
			items: [
				{
					label: 'Conquer Letter',
				},
			]
		}
	]);

</script>