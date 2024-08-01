<template>

	<AppHead :title="$t('_Admins.Details')" />

	<Panel :title="$t('_Admins.Details')">

		<template #actions>

			<ActionButton
				:ability="Ability.ADMINS_INDEX"
				:label="$t('_Admins.Index')"
				:href="route('dashboard.admins.index')"
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
				:label="$t('Role')"
				:value="model.role.name"
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