<template>

	<AppHead title="Top CPs" />

	<div class="px-20">

		<Tabs />

		<div class="bg-white p-10 mb-20 shadow-lg rounded-2xl border border-border-light dark:border-border-dark">

			<TablePagination
				:tableData="tableData"
				:queryParams="queryParams"
				:search="false"
				:pagination="false"
			>

				<Column :header="$t('Rank')">
					<template #body="slot">
						{{ slot.data.data }}
					</template>
				</Column>

				<Column :header="$t('Player Name')">
					<template #body="slot">
						{{ slot.data.data }}
					</template>
				</Column>

				<Column :header="$t('Total CPs')">
					<template #body="slot">
						{{ slot.data.data }}
					</template>
				</Column>

			</TablePagination>

		</div>

	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Tabs from './Tabs.vue';
	import TablePagination from '@/Components/Table/TablePagination.vue';
	import Column from 'primevue/column';
	import QueryParameters from '@/Classes/QueryParameters';
	import { ref } from "vue";

	const props = defineProps({
		tableData: Object,
	}), params = new QueryParameters(), queryParams = ref({});

</script>