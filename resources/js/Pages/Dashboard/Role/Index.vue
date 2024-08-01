<template>

	<AppHead :title="$t('_Roles.Index')" />

	<Panel :title="$t('_Roles.Index')">

		<template #actions>

			<ActionButton
				:ability="Ability.ROLES_CREATE"
				:label="$t('_Roles.Create')"
				:href="route('dashboard.roles.create')"
				type="create"
			/>

		</template>

		<div class="panel-content">

			<TablePagination :tableData="tableData">

				<Column :header="$t('Role')">
					<template #body="slot">
						<Anchor
							:ability="Ability.ROLES_SHOW"
							:href="route('dashboard.roles.show', slot.data.id)"
							:label="slot.data.name"
						/>
					</template>
				</Column>

				<Column :header="$t('Abilities Count')">
					<template #body="slot">
						{{ slot.data.abilitiesCount }}
					</template>
				</Column>

				<Column :header="$t('Actions')">
					<template #body="slot">
						<div class="flex justify-center items-center gap-3">
							<EditButton
								:ability="Ability.ROLES_UPDATE"
								:href="route('dashboard.roles.edit', slot.data.id)"
							/>
							<DeleteButton
								:ability="Ability.ROLES_DELETE"
								:href="route('dashboard.roles.delete', slot.data.id)"
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
	import { Ability } from '@/Classes/Ability';

	const props = defineProps({
		tableData: Object,
	});

</script>