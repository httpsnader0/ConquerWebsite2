<template>

	<AppHead title="Top PK" />

	<Tabs />

	<div class="panel-content">

		<TablePagination
			:tableData="tableData"
			:queryParams="queryParams"
			:search="false"
		>

			<Column :header="$t('Rank')">
				<template #body="slot">
					<div class="flex items-center justify-center">
						<img
							v-if="validURL(slot.data.Rank)"
							:src="slot.data.Rank"
							:alt="slot.data.Name"
							class="w-10 h-10 rounded"
						>
						<span
							v-else
							v-text="slot.data.Rank"
						/>
					</div>
				</template>
			</Column>

			<Column :header="$t('Player Name')">
				<template #body="slot">
					<Link
						:href="route('website.players.index', slot.data.UID)"
						class="anchor-component !flex items-center justify-center gap-2"
					>
					<img
						:src="slot.data.Face"
						:alt="slot.data.Name"
						class="w-10 h-10 rounded mr-2"
					>
					{{ slot.data.Name }}
					</Link>
				</template>
			</Column>

			<Column :header="$t('Class')">
				<template #body="slot">
					<div class="flex items-center justify-center gap-2">
						<img
							:src="slot.data.ClassIcon"
							:alt="slot.data.Name"
							class="w-6 h-6 bg-gray-200 rounded-full"
						>
						{{ slot.data.Class }}
					</div>
				</template>
			</Column>

			<Column
				:header="$t('Total PK Points')"
				field="PkPoints"
			/>

		</TablePagination>

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