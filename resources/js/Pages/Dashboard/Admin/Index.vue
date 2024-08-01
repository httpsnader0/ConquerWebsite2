<template>

	<AppHead :title="$t('_Admins.Index')" />

	<Panel :title="$t('_Admins.Index')">

		<template #actions>

			<ActionButton
				:ability="Ability.ADMINS_CREATE"
				:label="$t('_Admins.Create')"
				:href="route('dashboard.admins.create')"
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

					<FilterSelect
						:queryParams="queryParams"
						:options="roleOptions"
						name="role_id"
						:placeholder="$t('Roles')"
					/>

				</template>

				<Column :header="$t('Name')">
					<template #body="slot">
						<Anchor
							:ability="Ability.ADMINS_SHOW"
							:href="route('dashboard.admins.show', slot.data.id)"
							:label="slot.data.name"
						/>
					</template>
				</Column>

				<Column :header="$t('Role')">
					<template #body="slot">
						<Anchor
							v-if="slot.data.role.id && slot.data.role.id != 1"
							:ability="Ability.ROLES_INDEX"
							:href="route('dashboard.roles.show', slot.data.role.id)"
							:label="slot.data.role.name"
						/>
					</template>
				</Column>

				<Column :header="$t('Status')">
					<template #body="slot">
						<ToggleButton
							:ability="Ability.ADMINS_CHANGE_STATUS"
							:href="route('dashboard.admins.change-status', slot.data.id)"
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
								:ability="Ability.ADMINS_UPDATE"
								:href="route('dashboard.admins.edit', slot.data.id)"
							/>
							<DeleteButton
								:ability="Ability.ADMINS_DELETE"
								:href="route('dashboard.admins.delete', slot.data.id)"
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
		roleOptions: Object,
	});
	const params = new QueryParameters(), queryParams = ref({
		role_id: params.integerValue('role_id'),
		is_active: params.stringValue('is_active'),
	});

</script>