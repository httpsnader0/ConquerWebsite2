<template>

	<AppHead :title="$t('_Roles.Details')" />

	<Panel :title="$t('_Roles.Details')">

		<template #actions>

			<ActionButton
				:ability="Ability.ROLES_INDEX"
				:label="$t('_Roles.Index')"
				:href="route('dashboard.roles.index')"
			/>

		</template>

		<Tabs :model="model" />

		<div class="panel-content">

			<ProfileInfo
				:label="$t('ID')"
				:value="model.id"
			/>

			<ProfileInfo
				:label="$t('Name')"
				:value="model.name"
			/>

			<ProfileInfo
				:label="$t('Abilities Count')"
				:value="model.abilitiesCount"
			/>

			<ProfileInfo
				:label="$t('Created At')"
				:value="model.createdAt"
				class="capitalize"
			/>

			<ProfileInfo
				:label="$t('Updated At')"
				:value="model.updatedAt"
				class="capitalize"
			/>

		</div>

	</Panel>

</template>

<script setup>

	import Tabs from './Tabs.vue';
	import ProfileInfo from '@/Components/Shared/ProfileInfo.vue';
	import { Ability } from '@/Classes/Ability';

	const props = defineProps({
		model: Object,
	});

</script>