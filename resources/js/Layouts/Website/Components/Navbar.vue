<template>

	<nav class="web-menu">

		<img
			:src="asset($page.props.settings.logo)"
			class="logo"
		>

		<ul>

			<template
				v-for="(menu, index) in $page.props.menu.items"
				:key="index"
			>
				<li>
					<Link
						:href="menu.route"
						:class="{ 'menu-active': menu.active }"
					>
					<Icon :icon="['fas', menu.icon]" />
					{{ menu.label }}
					</Link>
				</li>
			</template>

			<div class="buttons">
				<Login />

			</div>

		</ul>

	</nav>

</template>

<script setup>

	import Login from './Login.vue';

</script>