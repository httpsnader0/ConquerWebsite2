<template>

	<div class="flex lg:hidden">

		<Button
			@click="sidebarVisible = true"
			class="w-11 h-11 p-0 flex justify-center items-center"
		>

			<Icon :icon="['fas', 'bars']" />

		</Button>

		<Sidebar v-model:visible="sidebarVisible">

			<DashboardSidebar />

		</Sidebar>

	</div>

</template>

<script setup>

	import DashboardSidebar from '@/Layouts/Dashboard/Sidebar.vue';
	import { ref } from 'vue';

	const sidebarVisible = ref(false);

</script>