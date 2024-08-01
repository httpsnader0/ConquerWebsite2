<template>

	<TabMenu :items="items" />

</template>

<script setup>

	import TabMenu from '@/Components/Menu/TabMenu.vue';
	import { useI18n } from 'vue-i18n';

	const i18n = useI18n(), items = [
		{
			label: i18n.t('Profile'),
			icon: 'user',
			route: route('dashboard.profile.index'),
			active: route().current('dashboard.profile.index'),
		},
		{
			label: i18n.t('Change Password'),
			icon: 'lock',
			route: route('dashboard.profile.change-password.index'),
			active: route().current('dashboard.profile.change-password.*'),
		},
		{
			label: i18n.t('Notifications'),
			icon: 'bell',
			route: route('dashboard.profile.notifications.index'),
			active: route().current('dashboard.profile.notifications.*'),
		},
	];

</script>
