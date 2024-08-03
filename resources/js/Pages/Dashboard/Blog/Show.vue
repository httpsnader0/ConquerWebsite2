<template>

	<AppHead :title="$t('_Blogs.Details')" />

	<Panel :title="$t('_Blogs.Details')">

		<template #actions>

			<ActionButton
				:ability="Ability.BLOGS_INDEX"
				:label="$t('_Blogs.Index')"
				:href="route('dashboard.blogs.index')"
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