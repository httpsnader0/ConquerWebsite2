<template>

	<aside class="sidebar-container fixed ltr:left-0 rtl:right-0 top-0 w-64 h-full flex flex-col justify-start items-start bg-darkbg-primary text-white z-10 transition-all duration-300 ease-in-out">

		<div class="sidebar-logo">
			<img
				:src="asset($page.props.settings.logo)"
				class="h-full"
			/>
		</div>

		<ScrollPanel
			class="w-full h-[calc(100%-4rem)]"
			:pt="{
				bary: '!bg-opacity-20'
			}"
		>
			<ul class="w-full flex flex-col justify-start items-start gap-3 py-5">

				<template
					v-for="(menu, index) in $page.props.menu?.items.filter(menu => menu.items.length)"
					:key="index"
				>

					<li class="w-full text-gray-400 mt-5 px-5 text-xs">{{ menu.label }}</li>

					<li
						v-for="(item, index) in menu.items"
						:key="index"
						:ref="el => { toggleMenus[index] = false }"
						class="w-full pl-5"
					>

						<Link
							:href="item.route"
							class="w-full bg-transparent hover:w-[calc(100%-1.25rem)] hover:rounded-[10px] hover:bg-white hover:bg-opacity-5 transition-all duration-300 ease-in-out text-white ltr:rounded-l-[10px] rtl:rounded-r-[10px] text-sm py-4 px-5 flex justify-start items-center gap-3"
							:class="{ 'active-menu': item.active }"
							@click="closeSidebar"
						>
						<Icon
							:icon="['fas', `${item.icon}`]"
							class="!text-sm text-primary"
						/>
						{{ item.label }}
						</Link>

					</li>

				</template>

			</ul>
		</ScrollPanel>

	</aside>

</template>

<script setup>

	import { ref } from 'vue';

	const toggleMenus = ref([]);
	const closeSidebar = () => {
		const sidebarClose = document.querySelector('.p-sidebar-close');
		if (sidebarClose) {
			sidebarClose.click();
		}
	};

</script>