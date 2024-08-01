<template>

	<AppHead :title="$t('Dashboard')" />

	<Panel :title="$t('Dashboard')">

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mb-5">

			<div
				v-for="i in 8"
				:key="i"
				class="border p-5 text-center rounded shadow bg-white dark:bg-darkbg-primary dark:text-white border-border-light dark:border-border-dark"
			>
				STATICS {{ i }}
			</div>

		</div>

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

			<div
				v-for="i in 2"
				:key="i"
				class="border p-5 text-center rounded shadow bg-white dark:bg-darkbg-primary dark:text-white border-border-light dark:border-border-dark"
			>
				CHART {{ i }}
			</div>

		</div>

	</Panel>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Panel from '@/Components/Shared/Panel.vue';

</script>