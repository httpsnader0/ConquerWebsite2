<template>

	<AppHead :title="$t('_Blogs.Index')" />

	<Panel :title="$t('_Blogs.Index')">

		<template #actions>

			<ActionButton
				:ability="Ability.BLOGS_CREATE"
				:label="$t('_Blogs.Create')"
				:href="route('dashboard.blogs.create')"
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

				<Column :header="$t('Name')">
					<template #body="slot">
						<Anchor
							:ability="Ability.BLOGS_SHOW"
							:href="route('dashboard.blogs.show', slot.data.slug)"
							:label="slot.data.name"
						/>
					</template>
				</Column>

				<Column :header="$t('Status')">
					<template #body="slot">
						<ToggleButton
							:ability="Ability.BLOGS_CHANGE_STATUS"
							:href="route('dashboard.blogs.change-status', slot.data.slug)"
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
								:ability="Ability.BLOGS_UPDATE"
								:href="route('dashboard.blogs.edit', slot.data.slug)"
							/>
							<DeleteButton
								:ability="Ability.BLOGS_DELETE"
								:href="route('dashboard.blogs.delete', slot.data.slug)"
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

	const props = defineProps({
		tableData: Object,
	});
	const params = new QueryParameters(), queryParams = ref({
		is_active: params.stringValue('is_active'),
	});

</script>