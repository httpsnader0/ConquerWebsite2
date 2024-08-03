<template>

	<AppHead :title="$t('_Media.Index')" />

	<Panel :title="$t('_Media.Index')">

		<template #actions>

			<ActionButton
				:ability="Ability.MEDIA_CREATE"
				:label="$t('_Media.Create')"
				:href="route('dashboard.media.create')"
				type="create"
			/>

		</template>

		<div class="panel-content">

			<TablePagination
				:tableData="tableData"
				:queryParams="queryParams"
			>

				<template #filters>

					<FilterSelect
						:queryParams="queryParams"
						:options="[
							{ value: '1', name: $t('Active') },
							{ value: '0', name: $t('Not Active') },
						]"
						name="is_active"
						:placeholder="$t('Status')"
					/>

				</template>

				<Column :header="$t('Screenshots Or Videos')">
					<template #body="slot">
						<div class="flex justify-center">
							<FilePreview
								:src="slot.data.image"
								class="w-20"
							/>
						</div>
					</template>
				</Column>

				<Column :header="$t('Status')">
					<template #body="slot">
						<ToggleButton
							:ability="Ability.MEDIA_CHANGE_STATUS"
							:href="route('dashboard.media.change-status', slot.data.id)"
							:id="slot.data.id"
							:name="slot.data.name"
							:status="slot.data.isActive"
						/>
					</template>
				</Column>

				<Column :header="$t('Actions')">
					<template #body="slot">
						<div class="flex justify-center items-center gap-3">
							<EditButton
								:ability="Ability.MEDIA_UPDATE"
								:href="route('dashboard.media.edit', slot.data.id)"
							/>
							<DeleteButton
								:ability="Ability.MEDIA_DELETE"
								:href="route('dashboard.media.delete', slot.data.id)"
								:id="slot.data.id"
								:name="slot.data.name"
							/>
						</div>
					</template>
				</Column>

			</TablePagination>

		</div>

	</Panel>

</template>

<script setup>

	import TablePagination from '@/Components/Table/TablePagination.vue';
	import Column from 'primevue/column';
	import EditButton from '@/Components/Table/EditButton.vue';
	import DeleteButton from '@/Components/Table/DeleteButton.vue';
	import ToggleButton from '@/Components/Table/ToggleButton.vue';
	import { Ability } from '@/Classes/Ability';
	import { ref } from 'vue';
	import QueryParameters from '@/Classes/QueryParameters';
	import FilterSelect from "@/Components/Filter/FilterSelect.vue";
	import FilePreview from '@/Components/Avatar/FilePreview.vue';

	const props = defineProps({
		tableData: Object,
	});
	const params = new QueryParameters(), queryParams = ref({
		is_active: params.stringValue('is_active'),
	});

</script>