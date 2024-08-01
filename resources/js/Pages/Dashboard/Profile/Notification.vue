<template>

	<AppHead :title="$t('Notifications')" />

	<Panel :title="$t('Notifications')">

		<Tabs />

		<div class="panel-content">

			<TablePagination
				:table-data="tableData"
				:query-params="queryParams"
				:search="false"
			>

				<Column :header="$t('Type')">
					<template #body="slot">
						<Icon
							:icon="['fas', slot.data.type]"
							class="text-primary"
						/>
					</template>
				</Column>

				<Column :header="$t('Body')">
					<template #body="slot">
						{{ $t(slot.data.data.body?.translationKey).substr(0, 150) }}
					</template>
				</Column>

				<Column
					:header="$t('Created At')"
					field="createdAt"
				/>

			</TablePagination>

		</div>

	</Panel>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Panel from '@/Components/Shared/Panel.vue';
	import Tabs from './Tabs.vue';
	import Column from 'primevue/column';
	import TablePagination from '@/Components/Table/TablePagination.vue';
	import QueryParameters from '@/Classes/QueryParameters';
	import { ref } from 'vue';

	const props = defineProps({
		tableData: Object,
	});
	const params = new QueryParameters();
	const queryParams = ref({});

</script>