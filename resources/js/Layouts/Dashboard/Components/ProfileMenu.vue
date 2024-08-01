<template>

	<div>

		<Button
			@click="toggleProfile"
			class="w-11 h-11 p-0 flex justify-center items-center"
		>

			<Icon :icon="['fas', 'user']" />

		</Button>

		<Menu
			ref="profileMenu"
			:model="profileItems"
			:popup="true"
		>

			<template #start>

				<div class="w-full flex flex-col justify-center items-center gap-5 text-center p-5">

					<Avatar
						:image="asset($page.props.settings.icon)"
						class="!w-24 !h-24 !bg-transparent rounded-2xl overflow-hidden shadow"
					/>

					<div class="flex flex-col justify-center items-start">

						<span v-text="$page.props?.auth?.name" />

					</div>

				</div>

			</template>

			<template #item="{ item, label, props }">

				<Link
					v-if="item.route"
					:href="item.route"
					v-bind="props.action"
					class="flex justify-between items-center gap-3"
					:class="{ 'bg-primary': item.route === url + $page.url }"
				>

				<div class="flex justify-center items-center gap-3">

					<Icon
						v-bind="props.icon"
						:icon="['fas', `${item.icon}`]"
						:class="{ 'text-white': item.route === url + $page.url }"
					/>

					<span
						v-bind="props.label"
						:class="{ 'text-white': item.route === url + $page.url }"
						v-text="label"
					/>

				</div>

				<Badge v-if="item.hasOwnProperty('badge')">{{ item.badge }}</Badge>

				</Link>

				<div
					v-else
					v-bind="props.action"
					class="flex justify-start items-center gap-3"
				>

					<Icon
						v-bind="props.icon"
						:icon="['fas', `${item.icon}`]"
					/>

					<span
						v-bind="props.label"
						v-text="label"
					/>

				</div>

			</template>
		</Menu>

	</div>

</template>

<script setup>

	import { ref } from 'vue';
	import { useI18n } from 'vue-i18n';
	import { useToast } from 'primevue/usetoast';
	import { router, usePage } from '@inertiajs/vue3';

	const i18n = useI18n(), toast = useToast(), profileMenu = ref(), toggleProfile = (event) => {
		profileMenu.value.toggle(event);
	}, url = ref(window.location.origin);

	const profileItems = ref([
		{ separator: true },
		{
			label: i18n.t('Profile'),
			icon: 'user',
			route: route('dashboard.profile.index'),
		},
		{
			label: i18n.t('Change Password'),
			icon: 'lock',
			route: route('dashboard.profile.change-password.index'),
		},
		{
			label: i18n.t('Notifications'),
			icon: 'bell',
			route: route('dashboard.profile.notifications.index'),
			badge: usePage().props.auth?.notifications?.length ?? 0,
		},
		{
			label: i18n.t('Logout'),
			icon: 'right-from-bracket',
			command: () => {
				router.get(route('dashboard.profile.logout'), {}, {
					onSuccess: () => {
						toast.add({
							severity: 'success',
							detail: i18n.t('Logout Successfully'),
							life: 3000,
						});
					}
				});
			},
		},
	]);

</script>