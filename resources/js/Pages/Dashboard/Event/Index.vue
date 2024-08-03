<template>

	<AppHead :title="$t('_Events.Index')" />

	<Panel :title="$t('_Events.Index')">

		<template #actions>

			<ActionButton
				:ability="Ability.EVENTS_CREATE"
				:label="$t('_Events.Create')"
				:href="route('dashboard.events.create')"
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

				<Column :header="$t('Image')">
					<template #body="slot">
						<div class="flex justify-center">
							<FilePreview
								:src="slot.data.image"
								class="w-20"
							/>
						</div>
					</template>
				</Column>

				<Column :header="$t('Name')">
					<template #body="slot">
						<Anchor
							:ability="Ability.EVENTS_SHOW"
							:href="route('dashboard.events.show', slot.data.slug)"
							:label="slot.data.name"
						/>
					</template>
				</Column>

				<Column :header="$t('Status')">
					<template #body="slot">
						<ToggleButton
							:ability="Ability.EVENTS_CHANGE_STATUS"
							:href="route('dashboard.events.change-status', slot.data.slug)"
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
								:ability="Ability.EVENTS_UPDATE"
								:href="route('dashboard.events.edit', slot.data.slug)"
							/>
							<DeleteButton
								:ability="Ability.EVENTS_DELETE"
								:href="route('dashboard.events.delete', slot.data.slug)"
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