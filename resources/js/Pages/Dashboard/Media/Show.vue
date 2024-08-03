<template>

	<AppHead :title="$t('_Media.Details')" />

	<Panel :title="$t('_Media.Details')">

		<template #actions>

			<ActionButton
				:ability="Ability.MEDIA_INDEX"
				:label="$t('_Media.Index')"
				:href="route('dashboard.media.index')"
			/>

		</template>

		<Tabs :model="model" />

		<div class="panel-content">

			<ProfileInfo
				:label="$t('ID')"
				:value="model.id"
			/>

			<ProfileInfo
				:label="$t('Media')"
				:value="model.image"
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